@extends('layouts.app')

@section('title', 'Edit Milestone')

@section('content')
<h1 class="mb-4">Edit Milestone</h1>
<form action="{{ route('milestones.update', $milestone->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="milestone_name" class="form-label">Milestone Name</label>
        <input type="text" name="milestone_name" id="milestone_name" class="form-control" value="{{ $milestone->milestone_name ?? old('milestone_name') }}">
    </div>

    <div class="mb-3">
        <label for="target_completion_date" class="form-label">Target Completion Date</label>
        <input type="date" name="target_completion_date" id="target_completion_date" class="form-control" value="{{ $milestone->target_completion_date ?? old('target_completion_date') }}">
    </div>

    <div class="mb-3">
        <label for="deliverable" class="form-label">Deliverable</label>
        <textarea name="deliverable" id="deliverable" class="form-control" rows="4">{{ $milestone->deliverable ?? old('deliverable') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="pending" {{ $milestone->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ $milestone->status == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="overdue" {{ $milestone->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update Milestone</button>
</form>
@endsection