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
                            {{ $milestone->description }} - {{ $milestone->status }}
                            <a href="{{ route('milestones.show', $milestone->id) }}" class="btn btn-sm btn-info">View</a>
                        </li>
                    @endforeach
                </ul>
            @endif
            <a href="{{ route('milestones.create', ['grant_id' => $grant->id]) }}" class="btn btn-primary mt-3">Create Milestone</a>
        </div>
    </div>
</div>
@endsection