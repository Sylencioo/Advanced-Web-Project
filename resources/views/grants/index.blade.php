@extends('layouts.master')

@section('title', 'Grants')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-5">
        Grants
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">
        Manage and track research grants.
    </p>

    <div class="row mt-5">
        @foreach($grants as $grant)
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">{{ $grant->title }}</h3>
                    <p class="card-text">{{ $grant->provider }}</p>
                    <a href="{{ route('grants.show', $grant->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection