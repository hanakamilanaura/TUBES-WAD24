@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Karyawan</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('employee.create') }}" class="btn btn-primary">Tambah Karyawan</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->no_telp }}</td>
                <td>{{ $employee->address }}</td>
                <td>
                    <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-info">Lihat</a>
                    <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
