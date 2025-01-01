@extends('layouts.app')

@section('title', isset($project) ? 'Edit Project' : 'Add New Project')

@section('content')
<h1 class="mb-4">{{ isset($project) ? 'Edit Project' : 'Add New Project' }}</h1>
<form action="{{ isset($project) ? route('projects.update', $project->id) : route('projects.store') }}" method="POST">
    @csrf
    @if(isset($project))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="grant_id" class="form-label">Grant</label>
        <select name="grant_id" id="grant_id" class="form-control">
            @foreach($grants as $grant)
                <option value="{{ $grant->id }}" {{ (isset($project) && $project->grant_id == $grant->id) ? 'selected' : '' }}>
                    {{ $grant->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control" rows="4">{{ $project->description ?? old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="ongoing" {{ (isset($project) && $project->status == 'ongoing') ? 'selected' : '' }}>Ongoing</option>
            <option value="completed" {{ (isset($project) && $project->status == 'completed') ? 'selected' : '' }}>Completed</option>
            <option value="pending" {{ (isset($project) && $project->status == 'pending') ? 'selected' : '' }}>Pending</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="progress" class="form-label">Progress (%)</label>
        <input type="number" name="progress" id="progress" class="form-control" min="0" max="100" value="{{ $project->progress ?? old('progress') }}">
    </div>

    <button type="submit" class="btn btn-success">{{ isset($project) ? 'Update Project' : 'Create Project' }}</button>
</form>
@endsection