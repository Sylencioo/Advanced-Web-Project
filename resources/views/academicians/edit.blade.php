@extends('layouts.master')

@section('title', 'Edit Academician')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-5">
        Edit Academician
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">
        Update the details of the academician.
    </p>

    <form method="POST" action="{{ route('academicians.update', $academician->id) }}" class="mt-8 max-w-md mx-auto">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $academician->name) }}" required autofocus>
        </div>

        <!-- Staff Number -->
        <div class="mb-4">
            <label for="staff_number" class="form-label">Staff Number</label>
            <input type="text" id="staff_number" name="staff_number" class="form-control" value="{{ old('staff_number', $academician->staff_number) }}" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $academician->email) }}" required>
        </div>

        <!-- College -->
        <div class="mb-4">
            <label for="college" class="form-label">College</label>
            <input type="text" id="college" name="college" class="form-control" value="{{ old('college', $academician->college) }}" required>
        </div>

        <!-- Department -->
        <div class="mb-4">
            <label for="department" class="form-label">Department</label>
            <input type="text" id="department" name="department" class="form-control" value="{{ old('department', $academician->department) }}" required>
        </div>

        <!-- Position -->
        <div class="mb-4">
            <label for="position" class="form-label">Position</label>
            <select id="position" name="position" class="form-control" required>
                <option value="Professor" {{ old('position', $academician->position) == 'Professor' ? 'selected' : '' }}>Professor</option>
                <option value="Assoc Prof. Senior Lecturer" {{ old('position', $academician->position) == 'Assoc Prof. Senior Lecturer' ? 'selected' : '' }}>Assoc Prof. Senior Lecturer</option>
                <option value="Lecturer" {{ old('position', $academician->position) == 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Academician</button>
    </form>
</div>
@endsection