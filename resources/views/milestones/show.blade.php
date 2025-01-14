@extends('layouts.master')

@section('title', 'Milestone Details')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-5">
        Milestone Details
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">
        Details of the selected milestone.
    </p>

    <div class="card mt-5">
        <div class="card-body">
            <h3 class="card-title">{{ $milestone->milestone_name }}</h3>
            <p class="card-text"><strong>Target Completion Date:</strong> {{ $milestone->target_completion_date }}</p>
            <p class="card-text"><strong>Deliverable:</strong> {{ $milestone->deliverable }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $milestone->status }}</p>
            <p class="card-text"><strong>Remark:</strong> {{ $milestone->remark }}</p>
            <a href="{{ route('milestones.index') }}" class="btn btn-primary mt-3">Back to List</a>
            <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-warning mt-3">Edit</a>
            <form action="{{ route('milestones.destroy', $milestone->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection