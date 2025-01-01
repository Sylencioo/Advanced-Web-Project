@extends('layouts.app')

@section('title', 'Grant Details')

@section('content')
<h1 class="mb-4">Grant Details</h1>
<div class="card">
    <div class="card-header">
        {{ $grant->title }}
    </div>
    <div class="card-body">
        <p><strong>Provider:</strong> {{ $grant->provider }}</p>
        <p><strong>Amount:</strong> {{ $grant->amount }}</p>
        <p><strong>Start Date:</strong> {{ $grant->start_date }}</p>
        <p><strong>Duration:</strong> {{ $grant->duration }} months</p>
        <p><strong>Leader:</strong> {{ $grant->leader->name }}</p>
        <p><strong>Members:</strong></p>
        <ul>
            @foreach($grant->members as $member)
                <li>{{ $member->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
<a href="{{ route('grants.index') }}" class="btn btn-primary mt-3">Back to Grants</a>
@endsection