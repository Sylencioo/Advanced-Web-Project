<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Grant;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grants = Grant::with('milestones')->get();
        return view('milestones.index', compact('grants'));
    }

    /**
     * Display milestones for a specific grant.
     */
    public function milestonesByGrant($grant_id)
    {
        $grant = Grant::with('milestones')->findOrFail($grant_id);
        return view('milestones.byGrant', compact('grant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($grant_id)
    {
        return view('milestones.create', compact('grant_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $grant_id)
    {
        $validated = $request->validate([
            'milestone_name' => 'required|string|max:255',
            'target_completion_date' => 'required|date',
            'deliverable' => 'nullable|string',
            'status' => 'required|in:pending,completed,overdue',
            'remark' => 'nullable|string',
        ]);
    
        $milestone = new Milestone();
        $milestone->milestone_name = $validated['milestone_name'];
        $milestone->grant_id = $grant_id;
        $milestone->target_completion_date = $validated['target_completion_date'];
        $milestone->deliverable = $validated['deliverable'] ?? null;
        $milestone->status = $validated['status'];
        $milestone->remark = $validated['remark'] ?? null;
        $milestone->save();
    
        return redirect()->route('milestones.index')->with('success', 'Milestone added successfully!');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $milestone = Milestone::findOrFail($id);
        return view('milestones.show', compact('milestone'));
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
            'milestone_name' => 'required|string',
            'target_completion_date' => 'required|date',
            'deliverable' => 'nullable|string',
            'status' => 'required|in:pending,completed,overdue',
            'remark' => 'nullable|string',
        ]);

        $milestone = Milestone::findOrFail($id);
        $milestone->update($validated);

        return redirect()->route('milestones.byGrant', $milestone->grant_id)->with('success', 'Milestone updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $milestone = Milestone::findOrFail($id);
        $milestone->delete();

        return redirect()->route('milestones.byGrant', $milestone->grant_id)->with('success', 'Milestone deleted successfully!');
    }
}