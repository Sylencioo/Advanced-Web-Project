@extends('layouts.app')

@section('title', 'Milestones for Project')

@section('content')
<h1 class="mb-4">Milestones</h1>
<a href="{{ route('milestones.create', $project_id) }}" class="btn btn-primary mb-3">Add New Milestone</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Description</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($milestones as $milestone)
        <tr>
            <td>{{ $milestone->description }}</td>
            <td>{{ $milestone->deadline }}</td>
            <td>{{ ucfirst($milestone->status) }}</td>
            <td>
                <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('milestones.destroy', $milestone->id) }}" method="POST" style="display: inline-block;">
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