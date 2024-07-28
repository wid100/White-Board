<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;

use App\Models\Year;
use App\Models\Issue;
use App\Models\Month;
use App\Models\Editornote;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::all();
        return view('admin.issue.index', compact('issues'));
    }



    public function getPosts($id)
    {
        $issue = Issue::findOrFail($id);
        $posts = Post::where('issue_id', $issue->id)->get();

        return response()->json($posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editorialnots = Editornote::all();
        $years = Year::all();
        $months = Month::all();
        return view('admin.issue.create', compact('years', 'editorialnots', 'months'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'issue_number' => 'required|unique:issues,issue_number|string|max:255',
            'name' => 'required',
            'year_id' => 'required|',
            'issue_month' => 'required',
            'editorialnote_id' => 'required',
            'editorial_note' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate slug from name and issue number
        $slug = Str::slug($validated['name']) . '_' . $validated['issue_number'];

        // Determine the issue status
        $status = $request->has('status') ? true : false;

        // Create a new Issue record
        $issue = new Issue([
            'year_id' => $validated['year_id'],
            'editornote_id' => $validated['editorialnote_id'],
            'slug' => $slug,
            'issue_number' => $validated['issue_number'],
            'issue_month' => $validated['issue_month'],
            'name' => $validated['name'],
            'editorial_note' => $validated['editorial_note'],
            'status' => $status
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/issue'), $imageName);
            $issue->image = 'assets/images/issue/' . $imageName;
        }
        $issue->save();

        // Redirect or respond as needed
        return redirect()->route('admin.issue.index')->with('success', 'Issue created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the issue by ID
        $issue = Issue::findOrFail($id);

        // Get additional data if needed (e.g., years, months, etc.)
        $years = Year::all(); // assuming you have a Year model
        $months = Month::all(); // assuming you have a Month model
        $editorialNotes = Editornote::all(); // assuming you have an EditorialNote model

        // Return the edit view with the issue data
        return view('admin.issue.edit', compact('issue', 'years', 'months', 'editorialNotes'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'issue_number' => 'required|unique:issues,issue_number,' . $id . '|string|max:255',
            'name' => 'required',
            'year_id' => 'required',
            'issue_month' => 'required',
            'editorialnote_id' => 'required',
            'editorial_note' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the issue by ID
        $issue = Issue::findOrFail($id);

        // Update issue details
        $issue->year_id = $validated['year_id'];
        $issue->editornote_id = $validated['editorialnote_id'];
        $issue->slug = Str::slug($validated['name']) . '_' . $validated['issue_number'];
        $issue->issue_number = $validated['issue_number'];
        $issue->issue_month = $validated['issue_month'];
        $issue->name = $validated['name'];
        $issue->editorial_note = $validated['editorial_note'];
        $issue->status = $request->has('status');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($issue->image && file_exists(public_path($issue->image))) {
                unlink(public_path($issue->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/issue'), $imageName);
            $issue->image = 'assets/images/issue/' . $imageName;
        }

        $issue->save();

        // Redirect or respond as needed
        return redirect()->route('admin.issue.index')->with('success', 'Issue updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);

        if ($issue->image && file_exists(public_path($issue->image))) {
            unlink(public_path($issue->image));
        }

        $issue->delete();

        return redirect()->route('admin.issue.index')->with('success', 'Issue deleted successfully!');
    }
}
