@extends('layouts.master')

@section('title', 'Grant Details')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mt-5">
        Grant Details
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300 mt-3">
        Details of the selected grant.
    </p>

    <div class="card mt-5">
        <div class="card-header">
            {{ $grant->title }}
        </div>
        <div class="card-body">
            <p><strong>Provider:</strong> {{ $grant->provider }}</p>
            <p><strong>Amount:</strong> {{ $grant->amount }}</p>
            <p><strong>Start Date:</strong> {{ $grant->start_date }}</p>
            <p><strong>Duration:</strong> {{ $grant->duration }} months</p>
            <p><strong>Leader:</strong> {{ $grant->leader ? $grant->leader->name : 'N/A' }}</p>
            <p><strong>Members:</strong></p>
            <ul>
                @foreach($grant->members as $member)
                    <li>
                        {{ $member->name }}
                        <form action="{{ route('grants.removeMember', ['grant_id' => $grant->id, 'academician_id' => $member->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <form action="{{ route('grants.addMember', $grant->id) }}" method="POST" class="mt-3">
                @csrf
                <div class="form-group">
                    <label for="academician_id">Add Member</label>
                    <select name="academician_id" id="academician_id" class="form-control">
                        @foreach($academicians as $academician)
                            <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-2">Add Member</button>
            </form>
            <a href="{{ route('grants.index') }}" class="btn btn-primary mt-3">Back to Grants</a>
            <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-warning mt-3">Edit</a>
            <form action="{{ route('grants.destroy', $grant->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection