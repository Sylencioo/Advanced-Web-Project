@extends('layouts.app')

@section('title', 'Milestone Details')

@section('content')
<h1 class="mb-4">Milestone Details</h1>
<div class="card">
    <div class="card-header">
        {{ $milestone->milestone_name }}
    </div>
    <div class="card-body">
        <p><strong>Target Completion Date:</strong> {{ $milestone->target_completion_date }}</p>
        <p><strong>Deliverable:</strong> {{ $milestone->deliverable }}</p>
        <p><strong>Status:</strong> {{ $milestone->status }}</p>
        <p><strong>Remark:</strong> {{ $milestone->remark }}</p>
        <p><strong>Date Updated:</strong> {{ $milestone->date_updated }}</p>
    </div>
</div>
<a href="{{ route('milestones.index', ['grant_id' => $milestone->grant_id]) }}" class="btn btn-primary mt-3">Back to Milestones</a>
@endsection