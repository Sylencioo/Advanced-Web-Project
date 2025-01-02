@extends('layouts.master')

@section('title', 'Login')

@section('content')
<div class="text-center">
    <h1 class="register-heading">Login</h1>
    <p class="register-subheading">Access your account to manage grants, academicians, and milestones.</p>
</div>
<div class="form-container">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
