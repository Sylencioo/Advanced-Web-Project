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

    <div class="row mt-5">
        @foreach($academicians as $academician)
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">{{ $academician->name }}</h3>
                    <p class="card-text">{{ $academician->department }}</p>
                    <a href="{{ route('academicians.show', $academician->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection