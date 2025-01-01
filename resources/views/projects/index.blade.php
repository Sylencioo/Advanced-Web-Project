@extends('layouts.app')

@section('title', 'All Projects')

@section('content')
<h1 class="mb-4">Projects</h1>
<a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Add New Project</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Description</th>
            <th>Status</th>
            <th>Progress</th>
            <th>Grant</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->description }}</td>
            <td>{{ ucfirst($project->status) }}</td>
            <td>{{ $project->progress }}%</td>
            <td>{{ $project->grant->title }}</td>
            <td>
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('milestones.index', $project->id) }}" class="btn btn-info btn-sm">View Milestones</a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection