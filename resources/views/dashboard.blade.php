@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Dashboard</h3>
        </div>
        <div class="card-body">
            @auth
                <p>Selamat datang, {{ Auth::user()->name }}!</p>
                <p>Email Anda: {{ Auth::user()->email }}</p>
            @endauth

            @guest
                <p>Silakan <a href="{{ route('login') }}">login</a> untuk mengakses dashboard.</p>
            @endguest
        </div>
    </div>
@endsection