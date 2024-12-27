<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;

class AbsenceController extends Controller
{
    public function index()
    {
        $absence = Absence::all()->get();
        return view('absence.index', compact('absence'));
    }

    public function create()
    {
        $employee = Employee::all();
        $division = Division::all();
        $shift = Shift::all();
        $attendance = ['Present', 'Permission', 'Sick', 'Absent'];
        $islate = ['On Time', 'Late'];
        return view('absence.create', compact('employee', 'division', 'shift', 'attandance', 'islate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'attendance' => 'required|boolean',
            'is_late' => 'required|boolean',
            'last_division' => 'required',
            'current_division' => 'required',
            'id_karyawan' => 'required|integer',
            'shift_id' => 'required|integer',
        ]);

        Absence::create($request->all());
        return redirect()->route('absence.index')->with('success', 'Absence created successfully.');
    }

    public function show($id)
    {
        $absence = Absence::with('employee', 'division', 'shift')->find($id);
        return view('absence.show', compact('absence', 'employee', 'division', 'shift'));
    }

    public function edit($id)
    {
        $absence = Absence::find($id);
        $employee = Employee::all();
        $division = Division::all();
        $shift = Shift::all();
        $attendance = ['Present', 'Permission', 'Sick', 'Absent'];
        $islate = ['On Time', 'Late'];
        return view('absence.edit', compact('absence', 'employee', 'division', 'shift'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'attendance' => 'required|boolean',
            'is_late' => 'required|boolean',
            'last_division' => 'required',
            'current_division' => 'required',
            'id_karyawan' => 'required|integer',
            'shift_id' => 'required|integer',
        ]);

        $absence = Absence::find($id);
        $absence->update($request->all());

        return redirect()->route('absence.index')->with('success', 'Absence updated successfully.');
    }

    public function destroy($id)
    {
        $absence = Absence::find($id);
        $absence->delete();

        return redirect()->route('absence.index')->with('success', 'Absence deleted successfully.');
    }
}
