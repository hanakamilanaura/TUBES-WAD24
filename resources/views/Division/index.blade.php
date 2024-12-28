{{-- resources/views/division/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Divisions</h1>

    {{-- Pesan sukses jika ada --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol untuk membuat divisi baru --}}
    <a href="{{ route('division.create') }}" class="btn btn-primary mb-4">Create New Division</a>

    {{-- Tabel Daftar Divisi --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($divisions as $division)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $division->name }}</td>
                    <td>{{ $division->description }}</td>
                    <td>
                        {{-- Tautan untuk melihat detail divisi --}}
                        <a href="{{ route('division.show', $division->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        
                        {{-- Tautan untuk mengedit divisi --}}
                        <a href="{{ route('division.edit', $division->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        {{-- Form untuk menghapus divisi --}}
                        <form action="{{ route('division.destroy', $division->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this division?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No divisions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
