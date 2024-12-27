<?php

namespace App\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee; // Pastikan untuk mengimpor model Employee
use Illuminate\Http\Request; // Pastikan untuk mengimpor Request

class EmployeeController extends Controller
{
    ##Menampilkan daftar semua karyawan
    public function index()
    {
        $employees = Employee::all(); ##Mengambil semua data karyawan
        return response()->json($employees); ##Mengembalikan data dalam format JSON
    }

    ##Menyimpan karyawan baru ke database
    public function store(Request $request)
    {
        ##Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        ##Membuat karyawan baru
        $employee = Employee::create($request->all());
        return response()->json($employee, 201); ##Mengembalikan karyawan yang baru dibuat dengan status 201 Created
    }

    ##Menampilkan karyawan berdasarkan ID
    public function show($id)
    {
        $employee = Employee::findOrFail($id); ##Mencari karyawan berdasarkan ID
        return response()->json($employee); ##Mengembalikan data karyawan dalam format JSON
    }

    ##Memperbarui karyawan di database
    public function update(Request $request, $id)
    {
        ##Validasi input
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'no_telp' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
        ]);

        $employee = Employee::findOrFail($id); ##Mencari karyawan berdasarkan ID
        $employee->update($request->all()); ##Memperbarui data karyawan
        return response()->json($employee); ##Mengembalikan data karyawan yang telah diperbarui
    }

    ##Menghapus karyawan dari database
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id); ##Mencari karyawan berdasarkan ID
        $employee->delete(); ##Menghapus karyawan
        return response()->json(null, 204); ##Mengembalikan respons kosong dengan status 204 No Content
    }
}
