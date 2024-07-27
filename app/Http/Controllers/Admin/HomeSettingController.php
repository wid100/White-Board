<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\HomeSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Editornote;
use App\Models\Issue;

class HomeSettingController extends Controller
{



    public function edit($id)
    {
        $allPosts = Post::all();
        $editor_picks = Editornote::all();
        $latest_categoris = Category::all();
        $latest_issues = Issue::all();
        // $policy_streams =
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSetting  $homeSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSetting $homeSetting)
    {
        //
    }
}
