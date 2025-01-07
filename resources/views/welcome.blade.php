@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
<div class="text-center py-12">
    <!-- Main Heading -->
    <h1 class="welcome-heading text-gray-800 dark:text-gray-100">
        Welcome to the Research Grant Management System
    </h1>
    <p class="welcome-subheading text-gray-600 dark:text-gray-300">
        Manage grants, projects, and milestones efficiently.
    </p>

    <!-- Authenticated User Section -->
    @auth
        <p class="mt-4 text-lg text-gray-700 dark:text-gray-200">
            Welcome, {{ Auth::user()->name }}!
        </p>
        <a href="{{ route('grants.index') }}" class="btn btn-primary mt-4">View Grants</a>
    @else
        <!-- Guest Section -->
        <p class="mt-6 text-sm italic text-gray-500 dark:text-gray-400">
            Please login to access the system
        </p>
    @endauth    

    <!-- 3 Boxes Section -->
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">Academicians</h3>
                    <p class="card-text">Explore academic contributions and collaborations.</p>
                    <a href="{{ route('academicians.index')}}" class="btn-green">View Academicians</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">Grants</h3>
                    <p class="card-text">Manage and track research grants.</p>
                    <a href="{{ route('grants.index')}}" class="btn-green">View Grants</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h3 class="card-title">Milestones</h3>
                    <p class="card-text">Set and achieve project milestones.</p>
                    <a href="{{ route('milestones.index')}}" class="btn-green">View Milestones</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection