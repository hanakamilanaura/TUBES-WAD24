<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\Employee;
use App\Models\Division;
use App\Models\Shift;
use Carbon\Carbon;
use App\Http\Controllers\EmpolyeeController;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::with(['employee', 'division', 'shift'])
        ->orderBy('created_at', 'desc')
        ->get();
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
            // 'date' => 'required|date',
            // 'time' => 'required|date_format:H:i:s',
            'attendance' => 'required',
            // 'is_late' => 'required|boolean',
            // 'last_division' => 'required',
            'current_division' => 'required|exists:divisions,id',
            'id_employee' => 'required|exists:employees,id',
            'shift_id' => 'required|exists:shifts,id',
        ]);

        $current_time = date('H:i:s');

        $last_division = Absence::where('id_employee', $request->id_employee)->orderBy('created_at', 'desc')->first();

        if ($last_division == null) {
            $last_division = (object) ['current_division' => $request->current_division];
        }
        $shift = Shift::find($request->shift_id);

        $diff = strtotime($current_time) - strtotime($shift->time);
        if($diff > 0){
            $is_late = true;

        }else{
            $is_late = false;
        }

        Absence::create([
            'attendance' => $request->attendance,
            'is_late' => $is_late,
            'last_division' => $last_division->current_division,
            'current_division' => $request->current_division,
            'id_employee' => $request->id_employee,
            'shift_id' => $request->shift_id,
        ]);

        // Absence::create(attributes: $request->all());
        return redirect()->route('absence.index')->with('success', 'Absence created successfully.');
    }

    public function show($id)
    {
        $absences = Absence::with('employee', 'division', 'shift')->find($id);
        return view('absence.show', compact('absences', 'employees', 'divisions', 'shifts', 'attendances'));
    }

    public function edit($id)
    {
        $absences = Absence::find($id);
        $divisions = Division::all();
        $shifts = Shift::all();
        $attendances = ['present', 'sick', 'vacation', 'alpha'];
        return view('absence.edit', compact('absences', 'divisions', 'shifts', 'attendances'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'attendance' => 'required',
        'current_division' => 'required|exists:divisions,id',
        'shift_id' => 'required|exists:shifts,id',
    ]);

    // Find the absence record by ID
    $absence = Absence::find($id);

    // Update the absence record with the new data
    $absence->update($request->all());

    // Get the shift associated with the absence
    $shift = Shift::find($request->shift_id);

    // Get the current time
    $current_time = now()->format('H:i:s');

    // Calculate the difference between the current time and the shift time
    $absence_time = $absence->created_at->format('H:i:s');
    $diff = strtotime($absence_time) - strtotime($shift->time);

    // Determine if the absence is late
    $is_late = $diff > 0 ? true : false;

    // Update the is_late field in the absence record
    $absence->is_late = $is_late;
    $absence->save();

    return redirect()->route('absence.index')->with('success', 'Absence updated successfully.');
}


    public function destroy($id)
    {
        $absences = Absence::find($id);
        $absences->delete();

        return redirect()->route('absence.index')->with('success', 'Absence deleted successfully.');
    }

    public function dashboard()
    {
        $totalAbsences = Absence::count();

        return view('dashboard.index', compact('totalAbsences'));
    }
}
