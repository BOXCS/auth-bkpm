@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Login</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p class="mt-3">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>.</p>
        </div>
    </div>
@endsection