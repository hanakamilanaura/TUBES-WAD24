@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Karyawan</h1>
    <p><strong>ID:</strong> {{ $employee->id }}</p>
    <p><strong>Nama:</strong> {{ $employee->name }}</p>
    <p><strong>No Telepon:</strong> {{ $employee->no_telp }}</p>
    <p><strong>Alamat:</strong> {{ $employee->address }}</p>
    <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('employee.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
