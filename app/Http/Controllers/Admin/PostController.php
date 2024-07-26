<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Issue;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Fetch active issues, categories, and tags
        $issues = Issue::where('status', true)->get();
        $categories = Category::where('status', true)->get(); // Adjust if you have a status column
        $tags = Tag::where('status', 1)->get();
        $users = User::where('role_id', 5)->get();

        return view('admin.post.create', compact('issues', 'categories', 'users', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation rules with custom messages
        $validated = $request->validate([
            'issue_id' => 'required|exists:issues,id',
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'required|exists:tags,id',
            'title' => 'required|string|max:255',
            'post_type' => 'required|string|max:255',
            'author_id' => 'required|exists:users,id',
            'post_date' => 'required|date',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'issue_id.required' => 'The issue field is required.',
            'category_id.required' => 'The category field is required.',
            'tag_id.required' => 'The tag field is required.',
            'author_id.exists' => 'The selected writer does not exist.',
            'post_date.required' => 'The post date is required.',
            'description.required' => 'The description field is required.',
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image may not be greater than 2MB.',
        ]);

        // Generate a unique slug
        $slug = Str::slug($validated['title']);
        $slug = Post::where('slug', $slug)->exists() ? $slug . '-' . time() : $slug;

        // Create a new post record
        $post = new Post([
            'issue_id' => $validated['issue_id'],
            'category_id' => $validated['category_id'],
            'tag_id' => $validated['tag_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'post_type' => $validated['post_type'],
            'author_id' => $validated['author_id'],
            'post_date' => $validated['post_date'],
            'description' => $validated['description'],
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_tag' => json_encode($validated['meta_tag']),
            'meta_description' => $validated['meta_description'] ?? null,
            'status' => $request->has('status') ? true : false,
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Store image in the 'public/assets/images/post' directory
            $imagePath = $image->storeAs('public/assets/images/post', $imageName);
            $post->image = Storage::url($imagePath);
        }

        // Save post
        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Post created successfully!');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Fetch active issues, categories, and tags
        $issues = Issue::where('status', true)->get();
        $categories = Category::where('status', true)->get(); // Adjust if you have a status column
        $tags = Tag::where('status', true)->get(); // Adjust if you have a status column
        $users = User::where('role_id', 5)->get();

        return view('admin.post.edit', compact('post', 'issues', 'categories', 'tags', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the post to be updated
        $post = Post::findOrFail($id);

        // Validation rules with custom messages
        $validated = $request->validate([
            'issue_id' => 'required|exists:issues,id',
            'category_id' => 'required|exists:categories,id',
            'tag_id' => 'required|exists:tags,id',
            'title' => 'required|string|max:255',
            'post_type' => 'required|string|max:255',
            'author_id' => 'required|exists:users,id',
            'post_date' => 'required|date',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_tag' => 'nullable',
            'meta_description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'issue_id.required' => 'The issue field is required.',
            'category_id.required' => 'The category field is required.',
            'tag_id.required' => 'The tag field is required.',
            'author_id.exists' => 'The selected writer does not exist.',
            'post_date.required' => 'The post date is required.',
            'description.required' => 'The description field is required.',
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image may not be greater than 2MB.',
        ]);

        // Generate a unique slug
        $slug = Str::slug($validated['title']);
        $slug = Post::where('slug', $slug)->where('id', '!=', $id)->exists() ? $slug . '-' . time() : $slug;

        // Update the post record
        $post->update([
            'issue_id' => $validated['issue_id'],
            'category_id' => $validated['category_id'],
            'tag_id' => $validated['tag_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'post_type' => $validated['post_type'],
            'author_id' => $validated['author_id'],
            'post_date' => $validated['post_date'],
            'description' => $validated['description'],
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_tag' => json_encode($validated['meta_tag']),
            'meta_description' => $validated['meta_description'] ?? null,
            'status' => $request->has('status') ? true : false,
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image) {
                Storage::delete($post->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Store image in the 'public/assets/images/post' directory
            $imagePath = $image->storeAs('public/assets/images/post', $imageName);
            $post->image = Storage::url($imagePath);
        }

        // Save updated post
        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Post updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        if ($post->image && file_exists(public_path($post->image))) {
            unlink(public_path($post->image));
        }
        $post->delete();

        return redirect()->route('admin.post.index')->with('success', 'Post deleted successfully!');
    }
}
