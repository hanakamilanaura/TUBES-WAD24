@extends('layouts.app')
@section('title', 'Edit Absence')
@section('content')
    <div class="container">
        <h1>Edit Absence</h1>
        <form action="{{ route('absence.update', $absences->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $absence->employee->name }}" required>
            </div>
            <div class="mb-3">
                <label for="last_division" class="form-label">Last Division</label>
                <input type="text" class="form-control" id="last_division" name="last_division" value="{{ $absence->division->last_division }}" required>
            </div>
            <div class="mb-3">
                <label for="division" class="form-label">Division</label>
                <input type="text" class="form-control" id="division" name="division" value="{{ $absence->division->current_division }}" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="text" class="form-control" id="Time" name="time" value="{{ $absence->time }}" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="text" class="form-control" id="date" name="date" value="{{ $absence->date }}" required>
            </div>
            <div class="mb-3">
                <label for="shift" class="form-label">Shift</label>
                <select class="form-control" id="shift" name="shift" required>
                    @foreach
                        <option value="{{ $shift->shift_id }}" {{ $shift->id == $absences->shift_id ? 'selected' : '' }}>{{ $shift->shift }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="attandance" class="form-label">Attandance</label>
                <select class="form-control" id="attandance" name="attandance" required>
                    @foreach
                        <option value="{{ $attandance }}" {{ $absence->attandance ? 'selected' : '' }}>{{ $attandance }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
