@extends('layouts.app')

@section('title', 'Detail Post')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">Ditulis oleh: {{ $post->user->name }}</p>
        <p class="text-muted">Tanggal: {{ $post->created_at->format('d M Y H:i') }}</p>
        <hr>
        <div>
            {!! nl2br(e($post->content)) !!}
        </div>
        <hr>
        <div class="mt-3">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
            @can('update', $post)
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            @endcan
        </div>
    </div>
@endsection