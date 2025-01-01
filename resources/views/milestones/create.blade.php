@extends('layouts.app')

@section('title', 'Edit Milestone')

@section('content')
<h1 class="mb-4">Edit Milestone</h1>
<form action="{{ route('milestones.update', $milestone->id) }}" method="POST">
    @csrf
    @method('PUT')

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
            <option value="pending" {{ $milestone->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ $milestone->status == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="overdue" {{ $milestone->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update Milestone</button>
</form>
@endsection