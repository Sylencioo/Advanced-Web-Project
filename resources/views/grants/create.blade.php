@extends('layouts.master')

@section('title', 'Add New Grant')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Add New Grant</h1>
    <form action="{{ route('grants.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="title">Grant Title</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter grant title" required>
        </div>
        <div class="form-group mt-3">
            <label for="provider">Provider</label>
            <input type="text" id="provider" name="provider" class="form-control" placeholder="Enter provider" required>
        </div>
        <div class="form-group mt-3">
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter amount" required>
        </div>
        <div class="form-group mt-3">
            <label for="start_date">Start Date</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="duration">Duration (in months)</label>
            <input type="number" id="duration" name="duration" class="form-control" placeholder="Enter duration in months" required>
        </div>
        <div class="form-group mt-3">
            <label for="leader_id">Project Leader</label>
            <select id="leader_id" name="leader_id" class="form-control" required>
                @foreach($academicians as $academician)
                    <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3 text-center">
            <button type="submit" class="btn btn-success">Save Grant</button>
        </div>
    </form>
</div>
@endsection