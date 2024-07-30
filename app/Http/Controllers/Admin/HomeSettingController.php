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

        // Decode JSON from the database
        $editorPickJson = json_decode($setting->editor_pick, true);
        $editorPickIds = $editorPickJson ? json_decode($editorPickJson[0], true) : []; // Adjust based on actual structure

        // Get posts related to the current latest issue
        $latestIssuePosts = $setting->latest_issue ? Post::where('issue_id', $setting->latest_issue)->get() : collect();

        return view('admin.setting.edit', compact('setting', 'allPosts', 'editor_picks', 'latest_categoris', 'latest_issues', 'policy_streams', 'latestIssuePosts', 'editorPickIds'));
    }



    public function update(Request $request, $id)
    {
        // Validate the request
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

        // Find the HomeSetting by ID
        $setting = HomeSetting::findOrFail($id);

        // Update the attributes with the validated data
        $setting->spotlight = $request->input('spotlight');
        $setting->editor_pick = json_encode($request->input('editor_pick')); // Encode as plain JSON array
        $setting->spotlight_second = json_encode($request->input('spotlight_second'));
        $setting->policy_stream = json_encode($request->input('policy_stream'));
        $setting->trending = json_encode($request->input('trending'));
        $setting->tailored_for_policymakers = json_encode($request->input('tailored_for_policymakers'));
        $setting->latest_issue = $request->input('latest_issue');
        $setting->latest_issue_post = json_encode($request->input('latest_issue_post'));
        $setting->latest_category = json_encode($request->input('latest_category'));

        // Save the updated settings
        $setting->save();

        // Redirect with success message
        return redirect()->route('admin.setting.edit', $setting->id)->with('success', 'Settings updated successfully.');
    }
}
