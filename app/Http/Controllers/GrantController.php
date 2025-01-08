<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\Academician;
use App\Models\User;
use Illuminate\Http\Request;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grants = Grant::all();
        return view('grants.index', compact('grants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $academicians = Academician::all();
        return view('grants.create', compact('academicians'));
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
            'leader_id' => 'required|exists:academicians,id',
            'members' => 'required|array',
            'members.*' => 'exists:academicians,id',
        ]);

        $grant = Grant::create([
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
        $academicians = Academician::all();
        return view('grants.show', compact('grant', 'academicians'));
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
    public function addMember(Request $request, $id)
    {
        $grant = Grant::findOrFail($id);
        $grant->members()->attach($request->academician_id);
        return redirect()->route('grants.show', $id)->with('success', 'Member added successfully!');
    }

    public function removeMember($grant_id, $academician_id)
    {
        $grant = Grant::findOrFail($grant_id);
        $grant->members()->detach($academician_id);
        return redirect()->route('grants.show', $grant_id)->with('success', 'Member removed successfully!');
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
