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
        $attendances = ['present', 'sick', 'vacation', 'alpha'];
        $islates = ['On Time', 'Late'];
        return view('absence.create', compact('employees', 'divisions', 'shifts', 'attendances', 'islates'));
    }

    public function store(Request $request)
    {   
        
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'attendance' => 'required|string',
            'is_late' => 'required|string',
            'last_division' => 'required|integer|min:0|exists:divisions,id',
            'current_division' => 'required|integer|min:0|exists:divisions,id',
            'id_employee' => 'required|integer|min:0|exists:employees,id',
            'shift_id' => 'required|integer|min:0|exists:shifts,id',
        ]);

        Absence::create(attributes: $request->all());
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
        $attendances = ['present', 'sick', 'vacation', 'alpha'];
        $islates = ['On Time', 'Late'];
        return view('absence.edit', compact('absences', 'employees', 'divisions', 'shifts', 'attendances', 'islates'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'attendance' => 'required|string',
            'is_late' => 'required|string',
            'last_division' => 'required|integer|min:0|exists:divisions,id',
            'current_division' => 'required|integer|min:0|exists:divisions,id',
            'id_employee' => 'required|integer|min:0|exists:employees,id',
            'shift_id' => 'required|integer|min:0|exists:shifts,id',
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
