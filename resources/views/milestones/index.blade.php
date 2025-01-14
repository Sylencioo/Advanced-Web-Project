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

    <div class="row mt-5">
        @foreach($grants as $grant)
        <div class="col-md-6">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">{{ $grant->title }}</h3>
                    <p class="card-text"><strong>Provider:</strong> {{ $grant->provider }}</p>
                    <p class="card-text"><strong>Amount:</strong> {{ $grant->amount }}</p>
                    <p class="card-text"><strong>Start Date:</strong> {{ $grant->start_date }}</p>
                    <p class="card-text"><strong>Duration:</strong> {{ $grant->duration }} months</p>
                    <p class="card-text"><strong>Leader:</strong> {{ $grant->leader ? $grant->leader->name : 'N/A' }}</p>
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
                    <a href="{{ route('milestones.create', ['grant_id' => $grant->id]) }}" class="btn btn-primary mt-3">Create Milestone</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection