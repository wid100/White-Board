<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\HomeSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Editornote;
use App\Models\Issue;
use App\Models\PolicyStream;

class HomeSettingController extends Controller
{



    public function index()
    {
        $settings = HomeSetting::get();
        return view('admin.setting.index', compact('settings'));
    }



    public function edit($id)
    {
        $setting = HomeSetting::findOrFail($id);
        $allPosts = Post::all();
        $editor_picks = Editornote::all();
        $latest_categoris = Category::all();
        $latest_issues = Issue::all();
        $policy_streams = PolicyStream::all();

        // Get posts related to the current latest issue
        $latestIssuePosts = $setting->latest_issue ? Post::where('issue_id', $setting->latest_issue)->get() : collect();

        return view('admin.setting.edit', compact('setting', 'allPosts', 'editor_picks', 'latest_categoris', 'latest_issues', 'policy_streams', 'latestIssuePosts'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSetting  $homeSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'spotlight' => 'required|string',
            'editor_pick' => 'required|array',
            'spotlight_second' => 'required|array',
            'policy_stream' => 'required|array',
            'trending' => 'required|array',
            'tailored_for_policymakers' => 'required|array',
            'latest_issue' => 'required|string',
            'latest_issue_post' => 'required|array',
            'latest_category' => 'required|array',
        ]);

        $setting = HomeSetting::findOrFail($id);
        $setting->spotlight = $request->spotlight;
        $setting->editor_pick = json_encode($request->editor_pick);
        $setting->spotlight_second = json_encode($request->spotlight_second);
        $setting->policy_stream = json_encode($request->policy_stream);
        $setting->trending = json_encode($request->trending);
        $setting->tailored_for_policymakers = json_encode($request->tailored_for_policymakers);
        $setting->latest_issue = $request->latest_issue;
        $setting->latest_issue_post = json_encode($request->latest_issue_post);
        $setting->latest_category = json_encode($request->latest_category);

        $setting->save();

        return redirect()->route('admin.setting.edit', $setting->id)->with('success', 'Settings updated successfully.');
    }
}
