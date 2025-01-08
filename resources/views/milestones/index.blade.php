@extends('layouts.master')

@section('title', 'Milestones')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-5">
        Milestones
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">
        Set and achieve project milestones.
    </p>

    <div class="text-right mb-3">
        <a href="{{ route('milestones.create', ['grant_id' => $grant->id]) }}" class="btn btn-primary">Add Milestone</a>
    </div>

    <div class="row mt-5">
        @foreach($milestones as $milestone)
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">{{ $milestone->milestone_name }}</h3>
                    <p class="card-text">{{ $milestone->status }}</p>
                    <a href="{{ route('milestones.show', $milestone->id) }}" class="btn-green">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection