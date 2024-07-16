<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Models\Editornote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditornoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editornots = Editornote::all();
        return view('admin.editornote.index', compact('editornots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editors = User::where('role_id', 5)->get();
        return view('admin.editornote.create', compact('editors'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'form_editor' => 'required',
            'title' => 'required',
            'description' => 'nullable|string',
        ]);

        $editornote = new Editornote();
        $editornote->creator = Auth::user()->id;
        $editornote->user_id = $validatedData['user_id'];
        $editornote->form_editor = $validatedData['form_editor'];
        $editornote->title = $validatedData['title'];
        $editornote->description = $validatedData['description'] ?? null;
        $editornote->status = $request->has('status');
        $editornote->save();

        return redirect()->route('admin.editornote.index')->with('success', 'Editor Note created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editornote  $editornote
     * @return \Illuminate\Http\Response
     */
    public function show(Editornote $editornote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editornote  $editornote
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editornote = Editornote::findOrFail($id);
        $editors = User::where('role_id', 5)->get();
        return view('admin.editornote.edit', compact('editornote', 'editors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editornote  $editornote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'form_editor' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $editornote = Editornote::findOrFail($id);
        $editornote->creator = Auth::user()->id;
        $editornote->user_id = $validatedData['user_id'];
        $editornote->form_editor = $validatedData['form_editor'];
        $editornote->title = $validatedData['title'];
        $editornote->description = $validatedData['description'];
        $status = $request->has('status') ? true : false;
        $editornote->status = $status;
        $editornote->save();

        return redirect()->route('admin.editornote.index')->with('success', 'Editor Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editornote  $editornote
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editornote = Editornote::findOrFail($id);
        $editornote->delete();

        return redirect()->route('admin.editornote.index')->with('success', 'Editor Note deleted successfully.');
    }
}
