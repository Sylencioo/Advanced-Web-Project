@extends('layouts.app')

@section('title', isset($milestone) ? 'Edit Milestone' : 'Add New Milestone')

@section('content')
<h1 class="mb-4">{{ isset($milestone) ? 'Edit Milestone' : 'Add New Milestone' }}</h1>
<form action="{{ isset($milestone) ? route('milestones.update', $milestone->id) : route('milestones.store') }}" method="POST">
    @csrf
    @if(isset($milestone))
        @method('PUT')
    @endif

    <input type="hidden" name="project_id" value="{{ $project_id ?? $milestone->project_id }}">

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="4">{{ $milestone->description ?? old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="deadline" class="form-label">Deadline</label>
        <input type="date" name="deadline" id="deadline" class="form-control" value="{{ $milestone->deadline ?? old('deadline') }}">
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="pending" {{ (isset($milestone) && $milestone->status == 'pending') ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ (isset($milestone) && $milestone->status == 'completed') ? 'selected' : '' }}>Completed</option>
            <option value="overdue" {{ (isset($milestone) && $milestone->status == 'overdue') ? 'selected' : '' }}>Overdue</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($milestone) ? 'Update Milestone' : 'Create Milestone' }}</button>
</form>
@endsection