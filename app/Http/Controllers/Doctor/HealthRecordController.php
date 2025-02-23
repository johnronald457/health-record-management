<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HealthRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = User::whereNotIn('role', ['nurse', 'doctor'])->get();
        return view('admin.health-record.index', compact('patients'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $patients = User::whereNotIn('role', ['nurse', 'doctor'])
            ->where(function ($query) use ($search) {
                $query->where('firstname', 'LIKE', "%{$search}%")
                    ->orWhere('lastname', 'LIKE', "%{$search}%")
                    ->orWhere('role', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('contact_no', 'LIKE', "%{$search}%");
            })
            ->get();
        return response()->json($patients);
    }

    public function show(string $id)
    {
        $patient = User::findOrFail($id);
        return view('patient.health-record-history', compact('patient'));
    }


    public function edit(string $id) {}


    public function update(Request $request, string $id) {}


    public function destroy(string $id) {}
}
