<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    // Menampilkan daftar semua cuti
    public function index()
    {
        $vacations = Vacation::with(['employee', 'editor'])->get(); // Mengambil semua cuti beserta data karyawan dan editor
        return response()->json($vacations); // Mengembalikan data dalam format JSON
    }

    // Menyimpan cuti baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'id_employee' => 'required|exists:employees,id',
            'edit_by' => 'required|exists:users,id',
        ]);

        // Membuat cuti baru
        $vacation = Vacation::create($request->all());
        return response()->json($vacation, 201); // Mengembalikan cuti yang baru dibuat dengan status 201 Created
    }

    // Menampilkan cuti berdasarkan ID
    public function show($id)
    {
        $vacation = Vacation::with(['employee', 'editor'])->findOrFail($id); // Mencari cuti berdasarkan ID
        return response()->json($vacation); // Mengembalikan data cuti dalam format JSON
    }

    // Memperbarui cuti di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after_or_equal:start_date',
            'reason' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|string|max:255',
            'id_employee' => 'sometimes|required|exists:employees,id',
            'edit_by' => 'sometimes|required|exists:users,id',
        ]);

        $vacation = Vacation::findOrFail($id); // Mencari cuti berdasarkan ID
        $vacation->update($request->all()); // Memperbarui data cuti
        return response()->json($vacation); // Mengembalikan data cuti yang telah diperbarui
    }

    // Menghapus cuti dari database
    public function destroy($id)
    {
        $vacation = Vacation::findOrFail($id); // Mencari cuti berdasarkan ID
        $vacation->delete(); // Menghapus cuti
        return response()->json(null, 204); // Mengembalikan respons kosong dengan status 204 No Content
    }
}
