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
    public function index($grant_id)
    {
        $milestones = Milestone::where('grant_id', $grant_id)->get();
        return view('milestones.index', compact('milestones', 'grant_id'));
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
            'description' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|in:pending,completed,overdue',
        ]);

        $validated['grant_id'] = $grant_id;

        Milestone::create($validated);

        return redirect()->route('milestones.index', $grant_id)->with('success', 'Milestone added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
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
            'description' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|in:pending,completed,overdue',
        ]);

        $milestone = Milestone::findOrFail($id);
        $milestone->update($validated);

        return redirect()->route('milestones.index', $milestone->grant_id)->with('success', 'Milestone updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $milestone = Milestone::findOrFail($id);
        $milestone->delete();

        return redirect()->route('milestones.index', $milestone->grant_id)->with('success', 'Milestone deleted successfully!');
    }
}