<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\Employee;
use App\Models\Division;
use App\Models\Shift;
use App\Http\Controllers\EmpolyeeController;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::with(['employee', 'division', 'shift'])->get();
        return view('absence.index', compact('absences'));
    }

    public function create()
    {
        $employees = Employee::all();
        $divisions = Division::all();
        $shifts = Shift::all();
        $attendances = ['Present', 'Permission', 'Sick', 'Absent'];
        $islates = ['On Time', 'Late'];
        return view('absence.create', compact('employees', 'divisions', 'shifts', 'attendances', 'islates'));
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
        $absences = Absence::with('employee', 'division', 'shift')->find($id);
        return view('absence.show', compact('absences', 'employees', 'divisions', 'shifts', 'attendances', 'islates'));
    }

    public function edit($id)
    {
        $absences = Absence::find($id);
        $employees = Employee::all();
        $divisions = Division::all();
        $shifts = Shift::all();
        $attendances = ['Present', 'Permission', 'Sick', 'Absent'];
        $islates = ['On Time', 'Late'];
        return view('absence.edit', compact('absences', 'employees', 'divisions', 'shifts', 'attendances', 'islates'));
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

        $absences = Absence::find($id);
        $absences->update($request->all());

        return redirect()->route('absence.index')->with('success', 'Absence updated successfully.');
    }

    public function destroy($id)
    {
        $absences = Absence::find($id);
        $absences->delete();

        return redirect()->route('absence.index')->with('success', 'Absence deleted successfully.');
    }
}
