<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($project_id)
    {
        $milestones = Milestone::where('project_id', $project_id)->get();
        return view('milestones.index', compact('milestones', 'project_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($project_id)
    {
        return view('milestones.create', compact('project_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'project_id' => 'required|exists:projects,id',
        'description' => 'required|string',
        'deadline' => 'required|date',
        'status' => 'required|in:pending,completed,overdue',
    ]);

    Milestone::create($validated);

    return redirect()->route('milestones.index', $validated['project_id'])->with('success', 'Milestone added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $milestone = Milestone::findOrFail($id);
        return view('milestones.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|in:pending,completed,overdue',
        ]);
    
        $milestone = Milestone::findOrFail($id);
        $milestone->update($validated);
    
        return redirect()->route('milestones.index', $milestone->project_id)->with('success', 'Milestone updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $milestone = Milestone::findOrFail($id);
        $milestone->delete();
    
        return redirect()->route('milestones.index', $milestone->project_id)->with('success', 'Milestone deleted successfully!');
    }
}
