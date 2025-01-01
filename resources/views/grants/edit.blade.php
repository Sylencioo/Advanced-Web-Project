@extends('layouts.app')

@section('title', 'Edit Grant')

@section('content')
<h1 class="mb-4">Edit Grant</h1>
<form action="{{ route('grants.update', $grant->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $grant->title) }}">
    </div>

    <div class="mb-3">
        <label for="provider" class="form-label">Provider</label>
        <input type="text" name="provider" id="provider" class="form-control" value="{{ old('provider', $grant->provider) }}">
    </div>

    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount', $grant->amount) }}">
    </div>

    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $grant->start_date) }}">
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label">Duration (months)</label>
        <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration', $grant->duration) }}">
    </div>

    <div class="mb-3">
        <label for="leader_id" class="form-label">Project Leader</label>
        <select name="leader_id" id="leader_id" class="form-control">
            @foreach($leaders as $leader)
                <option value="{{ $leader->id }}" {{ $leader->id == $grant->leader_id ? 'selected' : '' }}>{{ $leader->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="members" class="form-label">Project Members</label>
        <select name="members[]" id="members" class="form-control" multiple>
            @foreach($members as $member)
                <option value="{{ $member->id }}" {{ in_array($member->id, $grant->members->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $member->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update Grant</button>
</form>
@endsection