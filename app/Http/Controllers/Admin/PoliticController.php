<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Politic;
use Illuminate\Http\Request;

class PoliticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $politics = Politic::all();
        return view('admin.politic.index', compact('politics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.politic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
        ]);

        $politic = new Politic();
        $politic->title = $validatedData['title'];
        $politic->designation = $validatedData['designation'];
        $politic->name = $validatedData['name'];
        $politic->description = $validatedData['description'] ?? null;
        $politic->status = $request->has('status');
        $politic->save();


        // Redirect to index or wherever you want after saving
        return redirect()->route('admin.politic.index')->with('success', 'Politic created successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $politic = Politic::findOrFail($id);
        return view('admin.politic.edit', compact('politic'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
        ]);

        // Find the existing Politic record by ID
        $politic = Politic::findOrFail($id);

        // Update the record with new data
        $politic->title = $validatedData['title'];
        $politic->designation = $validatedData['designation'];
        $politic->name = $validatedData['name'];
        $politic->description = $validatedData['description'] ?? null;
        $politic->status = $request->has('status');
        $politic->save();

        // Redirect to index or wherever you want after updating
        return redirect()->route('admin.politic.index')->with('success', 'Politic updated successfully.');
    }


    // Remove the specified resource from storage.
    public function destroy(Politic $politic)
    {
        $politic->delete();

        // Redirect to index or wherever you want after deleting
        return redirect()->route('admin.politic.index')->with('success', 'Politic deleted successfully.');
    }
}
