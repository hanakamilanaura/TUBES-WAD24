@extends('layouts.app')
@section('title', 'Details Absence')
@section('content')

<div class="container">
    <h1>Details Absence</h1>
    
    <table class="table">
        <tr>
            <th>Name</th>
            <td>{{ $absence->employee->name }}</td>
        </tr>
        <tr>
            <th>last Divison</th>
            <td>{{ $absence->division->last_division }}</td>
        </tr>
        <tr>
            <th>Division</th>
            <td>{{ $absence->division->current_division }}</td>
        </tr>
        <tr>
            <th>Time</th>
            <td>{{ $absence->time }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $absence->date }}</td>
        </tr>
        <tr>
            <th>Shift</th>
            <td>{{ $absence->shift->shift }}</td>
        </tr>
        <tr>
            <th>Attandance</th>
            <td>{{ $attandance->attandance }}</td>
        </tr>
    </table>

    <a href="{{ route('absence.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection