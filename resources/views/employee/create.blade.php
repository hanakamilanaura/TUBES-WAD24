@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Karyawan</h1>
    <form action="{{ route('employee.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="no_telp">No Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('employee.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
