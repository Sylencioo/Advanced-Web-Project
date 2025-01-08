@extends('layouts.master')

@section('title', 'Add New Academician')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Add New Academician</h1>
    <form action="{{ route('academicians.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" required>
        </div>
        <div class="form-group mt-3">
            <label for="staff_number">Staff Number</label>
            <input type="text" id="staff_number" name="staff_number" class="form-control" placeholder="Enter staff number" required>
        </div>
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>
        <div class="form-group mt-3">
            <label for="college">College</label>
            <input type="text" id="college" name="college" class="form-control" placeholder="Enter college" required>
        </div>
        <div class="form-group mt-3">
            <label for="department">Department</label>
            <input type="text" id="department" name="department" class="form-control" placeholder="Enter department" required>
        </div>
        <div class="form-group">
    <label for="position">Position</label>
    <select name="position" id="position" class="form-control">
        <option value="Professor">Professor</option>
        <option value="Associate Professor">Assoc Prof. Senior Lecturer</option>
        <option value="Lecturer">Lecturer</option>
    </select>
</div>

        <div class="form-group mt-3 text-center">
            <button type="submit" class="btn btn-success">Save Academician</button>
        </div>
    </form>
</div>
@endsection