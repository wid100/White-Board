<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSetting;
use App\Models\Post;
use App\Models\Category;
use App\Models\Issue;
use App\Models\PolicyStream;
use App\Models\Editornote;
use App\Models\Politic;

class HomeController extends Controller
{



    public function index()
    {
        $homeSetting = HomeSetting::first();

        // Helper function to decode the nested JSON
        $decodeJsonArray = function ($jsonString) {
            if (is_string($jsonString)) {
                $decodedArrayString = json_decode($jsonString, true);
                if (is_array($decodedArrayString) && !empty($decodedArrayString)) {
                    return json_decode($decodedArrayString[0], true) ?: [];
                }
            }
            return [];
        };

        $politics = Politic::where('status', 1)->get();


        // Generic function to fetch and order collections based on IDs
        $fetchAndOrderCollection = function ($model, $ids) {
            $collection = $model::whereIn('id', $ids)->get();
            return $collection->sortBy(function ($item) use ($ids) {
                return array_search($item->id, $ids);
            })->values();
        };

        // Decode IDs from the home settings
        $editorPickIds = $decodeJsonArray($homeSetting->editor_pick);
        $spotlightSecondIds = $decodeJsonArray($homeSetting->spotlight_second);
        $policyStreamIds = $decodeJsonArray($homeSetting->policy_stream);

        // Fetch and order collections
        $spotlight = Post::find($homeSetting->spotlight);
        $editorPicks = $fetchAndOrderCollection(Editornote::class, $editorPickIds);
        $policyStreams = $fetchAndOrderCollection(PolicyStream::class, $policyStreamIds);
        $trendingIds = $decodeJsonArray($homeSetting->trending);
        $trendings = $fetchAndOrderCollection(Post::class, $trendingIds);
        $tailoredForPolicymakers = $fetchAndOrderCollection(Post::class, $decodeJsonArray($homeSetting->tailored_for_policymakers));
        $latestIssue = Issue::find($homeSetting->latest_issue);
        $latestIssuePosts = $fetchAndOrderCollection(Post::class, $decodeJsonArray($homeSetting->latest_issue_post));
        $latestCategories = $fetchAndOrderCollection(Category::class, $decodeJsonArray($homeSetting->latest_category));

        // Split the latestIssuePosts into first, second, and remaining
        $firstLatestIssuePost = $latestIssuePosts->first();
        $secondLatestIssuePost = $latestIssuePosts->slice(1, 1)->first();
        $remainingLatestIssuePosts = $latestIssuePosts->slice(2);
        $latest5Issues = Issue::orderBy('created_at', 'desc')->take(5)->get();

        // Fetch latest 5 posts for each category
        $categoriesWithLatestPosts = $latestCategories->map(function ($category) {
            $posts = Post::where('category_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
            return [
                'category' => $category,
                'posts' => $posts,
            ];
        });

        // Second spotlight section
        $spotlightSecondPosts = $fetchAndOrderCollection(Post::class, $spotlightSecondIds);
        [$firstSectionPosts, $secondSectionPosts] = $spotlightSecondPosts->split(2);

        return view('welcome', compact(
            'homeSetting',
            'spotlight',
            'editorPicks',
            'policyStreams',
            'trendings',
            'tailoredForPolicymakers',
            'latestIssue',
            'firstLatestIssuePost',
            'secondLatestIssuePost',
            'remainingLatestIssuePosts',
            'latestCategories',
            'categoriesWithLatestPosts',  // Pass the categories with latest posts
            'firstSectionPosts',
            'secondSectionPosts',
            'latest5Issues',
            'politics'
        ));
    }
}
