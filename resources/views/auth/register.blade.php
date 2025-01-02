@extends('layouts.master')

@section('title', 'Register')

@section('content')
<div class="text-center">
    <h1 class="register-heading">Register</h1>
    <p class="register-subheading">Create an account to start managing grants, academicians, and milestones.</p>
</div>
<div class="form-container">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" required autofocus>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn-register">Register</button>
    </form>
</div>
@endsection
