@extends('layouts.app')

@section('title', 'All Grants')

@section('content')
<h1 class="mb-4">Grants</h1>
<a href="{{ route('grants.create') }}" class="btn btn-primary mb-3">Add New Grant</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Title</th>
            <th>Provider</th>
            <th>Amount</th>
            <th>Start Date</th>
            <th>Duration</th>
            <th>Leader</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($grants as $grant)
        <tr>
            <td>{{ $grant->title }}</td>
            <td>{{ $grant->provider }}</td>
            <td>{{ $grant->amount }}</td>
            <td>{{ $grant->start_date }}</td>
            <td>{{ $grant->duration }} months</td>
            <td>{{ $grant->leader->name }}</td>
            <td>
                <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('grants.destroy', $grant->id) }}" method="POST" style="display: inline-block;">
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