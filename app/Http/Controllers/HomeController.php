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

        // Fetch related data using IDs stored in the settings
        $spotlight = Post::find($homeSetting->spotlight);
        $editorPicks = Editornote::whereIn('id', json_decode($homeSetting->editor_pick, true) ?: [])->get();
        $policyStreams = PolicyStream::whereIn('id', json_decode($homeSetting->policy_stream, true) ?: [])->get();
        $trending = Post::whereIn('id', json_decode($homeSetting->trending, true) ?: [])->get();
        $tailoredForPolicymakers = Post::whereIn('id', json_decode($homeSetting->tailored_for_policymakers, true) ?: [])->get();
        $latestIssue = Issue::find($homeSetting->latest_issue);
        $latestIssuePosts = Post::whereIn('id', json_decode($homeSetting->latest_issue_post, true) ?: [])->get();
        $latestCategories = Category::whereIn('id', json_decode($homeSetting->latest_category, true) ?: [])->get();


        //second spotlight section
        $spotlightSecondPosts = Post::whereIn('id', json_decode($homeSetting->spotlight_second, true))->get();

        [$firstSectionPosts, $secondSectionPosts] = $spotlightSecondPosts->split(2);


        return view('welcome', compact(
            'homeSetting',
            'spotlight',
            'editorPicks',
            'policyStreams',
            'trending',
            'tailoredForPolicymakers',
            'latestIssue',
            'latestIssuePosts',
            'latestCategories',
            'firstSectionPosts',
            'secondSectionPosts',
        ));
    }
}
