@extends('layouts.app')
@section('title', 'Add Absence')
@section('content')
    <div class="container">
        <h1>Tambah Absence</h1>
        <form action="{{ route('absence.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="last_division" class="form-label">Last Division</label>
                <input type="text" class="form-control" id="last_division" name="last_division" required>
            </div>
            <div class="mb-3">
                <label for="division" class="form-label">Division</label>
                <input type="text" class="form-control" id="division" name="division" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="timestamp" class="form-control" id="time" name="time" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
                <label for="shift" class="form-label">Shift</label>
                <select class="form-control" id="Shift" name="Shift" required>
                    @foreach
                        <option value="{{ $shift->id }}">{{ $shift->shift }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="attandance" class="form-label">Attandance</label>
                <select class="form-control" id="attandance" name="attandance" required>
                    @foreach 
                        <option value="{{ $attandance }}">{{ $attandance }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
