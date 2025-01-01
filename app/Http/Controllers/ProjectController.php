<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Grant;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('grant')->get(); // Fetch all projects with grant info
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grants = Grant::all(); // Fetch all grants
        return view('projects.create', compact('grants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'grant_id' => 'required|exists:grants,id',
            'description' => 'required|string',
            'status' => 'required|in:ongoing,completed,pending',
            'progress' => 'required|numeric|min:0|max:100',
        ]);
    
        Project::create($validated);
    
        return redirect()->route('projects.index')->with('success', 'Project added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $grants = Grant::all();
        return view('projects.edit', compact('project', 'grants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'grant_id' => 'required|exists:grants,id',
            'description' => 'required|string',
            'status' => 'required|in:ongoing,completed,pending',
            'progress' => 'required|numeric|min:0|max:100',
        ]);
    
        $project = Project::findOrFail($id);
        $project->update($validated);
    
        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
    
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
