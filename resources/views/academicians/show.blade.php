@extends('layouts.master')

@section('title', 'Academician Details')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-5">
        Academician Details
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">
        Details of the selected academician.
    </p>

    <div class="card mt-5">
        <div class="card-body">
            <h3 class="card-title">{{ $academician->name }}</h3>
            <p class="card-text"><strong>Staff Number:</strong> {{ $academician->staff_number }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $academician->email }}</p>
            <p class="card-text"><strong>College:</strong> {{ $academician->college }}</p>
            <p class="card-text"><strong>Department:</strong> {{ $academician->department }}</p>
            <p class="card-text"><strong>Position:</strong> {{ $academician->position }}</p>
            <a href="{{ route('academicians.index') }}" class="btn btn-primary mt-3">Back to List</a>
            @can('admin-actions')
            <a href="{{ route('academicians.edit', $academician->id) }}" class="btn btn-warning mt-3">Edit</a>
            <form action="{{ route('academicians.destroy', $academician->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3">Delete</button>
            </form>
            @endcan
            @can('academician-actions')
            <a href="{{ route('academicians.edit', $academician->id) }}" class="btn btn-warning mt-3">Edit</a>
            <form action="{{ route('academicians.destroy', $academician->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3">Delete</button>
            </form>
            @endcan
        </div>
    </div>
</div>
@endsection