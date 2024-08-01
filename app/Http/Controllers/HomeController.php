<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSetting;
use App\Models\Post;
use App\Models\Category;
use App\Models\Issue;
use App\Models\PolicyStream;
use App\Models\Editornote;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $homeSetting = HomeSetting::first();

        // Helper function to decode the nested JSON
        $decodeJsonArray = function ($jsonString) {
            if (is_string($jsonString)) {
                // Decode the outer JSON string to get the array string
                $decodedArrayString = json_decode($jsonString, true);

                if (is_array($decodedArrayString) && !empty($decodedArrayString)) {
                    // Decode the array string to get the actual array of IDs
                    return json_decode($decodedArrayString[0], true) ?: [];
                }
            }

            return [];
        };

        // Generic function to fetch and order collections based on IDs
        $fetchAndOrderCollection = function ($model, $ids) {
            $collection = $model::whereIn('id', $ids)->get();

            // Reorder the collection based on the original array of IDs
            return $collection->sortBy(function ($item) use ($ids) {
                return array_search($item->id, $ids);
            })->values(); // Use values() to reset keys
        };

        // Decode IDs from the home settings
        $editorPickIds = $decodeJsonArray($homeSetting->editor_pick);
        $spotlightSecondIds = $decodeJsonArray($homeSetting->spotlight_second);
        $policyStreamIds = $decodeJsonArray($homeSetting->policy_stream);

        // Fetch and order collections
        $spotlight = Post::find($homeSetting->spotlight);

        $editorPicks = $fetchAndOrderCollection(Editornote::class, $editorPickIds);
        $policyStreams = $fetchAndOrderCollection(PolicyStream::class, $policyStreamIds);
        $trendingIds = $decodeJsonArray($homeSetting->trending); // Make sure to use the correct field name
        $trendings = $fetchAndOrderCollection(Post::class, $trendingIds);
        $tailoredForPolicymakers = $fetchAndOrderCollection(Post::class, $decodeJsonArray($homeSetting->tailored_for_policymakers));
        $latestIssue = Issue::find($homeSetting->latest_issue);
        $latestIssuePosts = $fetchAndOrderCollection(Post::class, $decodeJsonArray($homeSetting->latest_issue_post));
        $latestCategories = $fetchAndOrderCollection(Category::class, $decodeJsonArray($homeSetting->latest_category));

        // Second spotlight section
        $spotlightSecondPosts = $fetchAndOrderCollection(Post::class, $spotlightSecondIds);

        // Split the reordered spotlightSecondPosts into two collections
        [$firstSectionPosts, $secondSectionPosts] = $spotlightSecondPosts->split(2);

        return view('welcome', compact(
            'homeSetting',
            'spotlight',
            'editorPicks',
            'policyStreams',
            'trendings',
            'tailoredForPolicymakers',
            'latestIssue',
            'latestIssuePosts',
            'latestCategories',
            'firstSectionPosts',
            'secondSectionPosts',
        ));
    }
}
