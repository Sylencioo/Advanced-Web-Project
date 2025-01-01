<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\User;
use Illuminate\Http\Request;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grants = Grant::with('leader')->get(); // Fetch all grants with leader info
        return view('grants.index', compact('grants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leaders = User::where('role', 'leader')->get(); // Fetch all project leaders
        return view('grants.create', compact('leaders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'leader_id' => 'required|exists:users,id',
            'members' => 'required|array',
            'members.*' => 'exists:users,id',
        ]);
    
        $grant = Grant::create($validated);([
        'title' => $validated['title'],
        'provider' => $validated['provider'],
        'amount' => $validated['amount'],
        'start_date' => $validated['start_date'],
        'duration' => $validated['duration'],
        'leader_id' => $validated['leader_id'],
        ]);
        $grant->members()->attach($validated['members']);
        return redirect()->route('grants.index')->with('success', 'Grant added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $grant = Grant::with('leader', 'members')->findOrFail($id);
        return view('grants.show', compact('grant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $grant = Grant::findOrFail($id);
        $leaders = User::where('role', 'leader')->get();
        $members = User::all();
        return view('grants.edit', compact('grant', 'leaders', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'leader_id' => 'required|exists:users,id',
            'members' => 'required|array',
            'members.*' => 'exists:users,id',
        ]);
    
        $grant = Grant::findOrFail($id);
        $grant->update([
            'title' => $validated['title'],
            'provider' => $validated['provider'],
            'amount' => $validated['amount'],
            'start_date' => $validated['start_date'],
            'duration' => $validated['duration'],
            'leader_id' => $validated['leader_id'],
        ]);
    
        $grant->members()->sync($validated['members']);
        
        return redirect()->route('grants.index')->with('success', 'Grant updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grant = Grant::findOrFail($id);
        $grant->delete();
    
        return redirect()->route('grants.index')->with('success', 'Grant deleted successfully!');
    }
}
