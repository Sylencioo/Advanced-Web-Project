@extends('layouts.master')

@section('title', 'Academicians')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-5">
        Academicians
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">
        Explore academic contributions and collaborations.
    </p>
    <div class="text-right mb-3">
        @can('admin-actions')
            <a href="{{ route('academicians.create') }}" class="btn btn-success">Add New Academician</a>
        @endcan
        @can('academician-actions')
            <a href="{{ route('academicians.create') }}" class="btn btn-success">Add New Academician</a>
        @endcan
    </div>

    <div class="row mt-5">
        @foreach($academicians as $academician)
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">{{ $academician->name }}</h3>
                    <p class="card-text">{{ $academician->department }}</p>
                    <div class="btn-group" role="group">
                        @can('admin-actions')
                            <a href="{{ route('academicians.show', $academician->id) }}" class="btn btn-sm btn-info">View Details</a>
                            <form method="POST" action="{{ route('academicians.destroy', $academician->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        @endcan

                        @can('academician-actions')
                            <a href="{{ route('academicians.edit', $academician->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('academicians.show', $academician->id) }}" class="btn btn-sm btn-info">View Details</a>
                            <form method="POST" action="{{ route('academicians.destroy', $academician->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        @endcan

                        @can('staff-actions')
                            <a href="#" class="btn btn-sm btn-secondary">View</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection