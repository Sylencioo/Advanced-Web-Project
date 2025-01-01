@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="text-center py-12">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
        Welcome to the Research Grant Management System
    </h1>
    <p class="text-lg text-gray-600 dark:text-gray-300">
        Manage grants, projects, and milestones efficiently.
    </p>
    @auth
        <p class="mt-4 text-lg text-gray-700 dark:text-gray-200">
            Welcome, {{ Auth::user()->name }}!
        </p>
        <a href="{{ route('grants.index') }}" class="btn btn-primary mt-4">View Grants</a>
    @else
        <p class="mt-4 text-lg text-gray-700 dark:text-gray-200">
            Welcome, Guest!
        </p>
    @endauth
</div>
@endsection