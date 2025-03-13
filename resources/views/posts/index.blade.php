@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
    <div class="container">
        <h1>Daftar Post</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Buat Post Baru</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Lihat</a>
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
