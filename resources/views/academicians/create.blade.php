@extends('layouts.master')

@section('title', 'Create Academician')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Create Academician</h1>
    @can('admin-actions')
    <form method="POST" action="{{ route('academicians.store') }}">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Select User</label>
            <select id="user_id" class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="staff_number" class="form-label">Staff Number</label>
            <input id="staff_number" type="text" class="form-control @error('staff_number') is-invalid @enderror" name="staff_number" value="{{ old('staff_number') }}" required>
            @error('staff_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="college" class="form-label">College</label>
            <input id="college" type="text" class="form-control @error('college') is-invalid @enderror" name="college" value="{{ old('college') }}" required>
            @error('college')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required>
            @error('department')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <select id="position" class="form-control @error('position') is-invalid @enderror" name="position" required>
                <option value="Professor">Professor</option>
                <option value="Assoc Prof. Senior Lecturer">Assoc Prof. Senior Lecturer</option>
                <option value="Lecturer">Lecturer</option>
            </select>
            @error('position')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endcan
</div>
@endsection