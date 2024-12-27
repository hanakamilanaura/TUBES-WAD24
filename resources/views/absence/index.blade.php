@extends('layouts.app')
@section('title', 'Absences')
@section('content')
<div class="container">
    <h1>Absence</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('absence.create') }}" class="btn btn-primary mb-3">Absence</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Last Division</th>
                <th>Division</th>
                <th>Time</th>
                <th>Date</th>
                <th>Shift</th>
                <th>Attandance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $absence->employee->name}}</td>
                <td>{{ $absence->division->last_division }}</td>
                <td>{{ $absence->division->current_division }}</td>
                <td>{{ $absence->time }}</td>
                <td>{{ $absence->date }}</td>
                <td>{{ $absence->shift->shift }}</td>
                <td>{{ $absence->attandance }}</td>
                <td>
                    <a href="{{ route('absence.edit', $absence->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('absence.destroy', $absence->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                    </form>
                    <a href="{{ route('absence.show', $absence->id) }}" class="btn btn-info btn-sm">Show</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
