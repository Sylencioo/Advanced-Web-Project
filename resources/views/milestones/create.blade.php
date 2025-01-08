@extends('layouts.master')

@section('title', 'Create Milestone')

@section('content')
<h1 class="mb-4">Create Milestone</h1>
<form action="{{ route('milestones.store', $grant_id) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="milestone_name" class="form-label">Milestone Name</label>
        <input type="text" name="milestone_name" id="milestone_name" class="form-control" value="{{ old('milestone_name') }}" required>
    </div>

    <div class="mb-3">
        <label for="target_completion_date" class="form-label">Target Completion Date</label>
        <input type="date" name="target_completion_date" id="target_completion_date" class="form-control" value="{{ old('target_completion_date') }}" required>
    </div>

    <div class="mb-3">
        <label for="deliverable" class="form-label">Deliverable</label>
        <textarea name="deliverable" id="deliverable" class="form-control" rows="4">{{ old('deliverable') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="overdue" {{ old('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="remark" class="form-label">Remark</label>
        <textarea name="remark" id="remark" class="form-control" rows="4">{{ old('remark') }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Create Milestone</button>
</form>
@endsection