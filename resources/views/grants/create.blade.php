@extends('layouts.app')

@section('title', 'Add New Grant')

@section('content')
<h1 class="mb-4">Add New Grant</h1>
<form action="{{ route('grants.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
    </div>

    <div class="mb-3">
        <label for="provider" class="form-label">Provider</label>
        <input type="text" name="provider" id="provider" class="form-control" value="{{ old('provider') }}">
    </div>

    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount') }}">
    </div>

    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label">Duration (months)</label>
        <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration') }}">
    </div>

    <div class="mb-3">
        <label for="leader_id" class="form-label">Project Leader</label>
        <select name="leader_id" id="leader_id" class="form-control">
            @foreach($leaders as $leader)
                <option value="{{ $leader->id }}">{{ $leader->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save Grant</button>
</form>
@endsection