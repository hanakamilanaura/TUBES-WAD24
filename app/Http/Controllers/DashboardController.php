<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Employee;
use App\Models\Division;
use App\Models\Shift;
use App\Models\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total karyawan
        $totalEmployees = Employee::count();

        // Menghitung total divisi
        $totalDivisions = Division::count();

        // Menghitung total shift
        $totalShifts = Shift::count();

        // Menghitung jumlah karyawan yang hadir hari ini
        $today = Carbon::today()->toDateString();;
        $totalAbsences = Absence::whereDate('created_at', $today)
        ->where('attendance', 'present')
        ->count();

        // Menghitung jumlah cuti berdasarkan status
        $approvedVacations = Vacation::where('status', 'approved')->count();
        $rejectedVacations = Vacation::where('status', 'rejected')->count();
        $pendingVacations = Vacation::where('status', 'pending')->count();
        

        return view('dashboard.index', compact('totalEmployees','totalDivisions','totalShifts','totalAbsences', 'approvedVacations', 'rejectedVacations', 'pendingVacations'));
    }
}