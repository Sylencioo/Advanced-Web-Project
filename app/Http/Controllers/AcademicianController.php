<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcademicianController extends Controller
{
    public function index()
    {
        $academicians = Academician::all();
        
        return view('academicians.index', compact('academicians'));
    }

    public function create()
    {
        $users = User::where('role', 'academician')->get();
        return view('academicians.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'staff_number' => 'required|string|max:255|unique:academicians',
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|in:Professor,Assoc Prof. Senior Lecturer,Lecturer',
        ]);

        $user = User::find($request->user_id);

        Academician::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'staff_number' => $request->staff_number,
            'email' => $user->email,
            'college' => $request->college,
            'department' => $request->department,
            'position' => $request->position,
        ]);

        return redirect()->route('welcome')->with('success', 'Academician profile completed successfully.');
    }

    public function show(Academician $academician)
    {
        return view('academicians.show', compact('academician'));
    }

    public function edit(Academician $academician)
    {
        return view('academicians.edit', compact('academician'));
    }

    public function update(Request $request, Academician $academician)
    {
        $request->validate([
            'staff_number' => 'required|string|max:255|unique:academicians,staff_number,' . $academician->id,
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|in:Professor,Assoc Prof. Senior Lecturer,Lecturer',
        ]);

        $academician->update([
            'staff_number' => $request->staff_number,
            'college' => $request->college,
            'department' => $request->department,
            'position' => $request->position,
        ]);

        return redirect()->route('academicians.index')->with('success', 'Academician profile updated successfully.');
    }

    public function destroy(Academician $academician)
    {
        $academician->delete();
        return redirect()->route('academicians.index')->with('success', 'Academician profile deleted successfully.');
    }
}