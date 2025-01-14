@extends('layouts.master')

@section('title', 'Milestones for ' . $grant->title)

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-5">
        Milestones for {{ $grant->title }}
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">
        Set and achieve project milestones.
    </p>

    <div class="card mt-5">
        <div class="card-body">
            <h4 class="mt-4">Milestones</h4>
            @if($grant->milestones->isEmpty())
                <p>No milestones created yet.</p>
            @else
                <ul class="list-group">
                    @foreach($grant->milestones as $milestone)
                        <li class="list-group-item">
                            {{ $milestone->milestone_name }}
                            <a href="{{ route('milestones.show', $milestone->id) }}" class="btn btn-sm btn-info">View</a>
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="d-flex justify-content-center mt-3">
                <a href="{{ route('milestones.create', ['grant_id' => $grant->id]) }}" class="btn btn-info mr-2">Create Milestone</a>
                <a href="{{ route('grants.show', $grant->id) }}" class="btn btn-primary ml-2">Back to Grant</a>
                <a href="{{ route('milestones.index') }}" class="btn btn-secondary ml-2">Back to Milestones</a>
            </div>
        </div>
    </div>
</div>
@endsection