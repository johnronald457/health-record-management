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



    public function create() {}

    public function store(Request $request) {}


    public function show(string $id)
    {
        $patient = User::findOrFail($id);
        return view('patient.health-record-history', compact('patient'));
    }


    public function edit(string $id) {}


    public function update(Request $request, string $id) {}


    public function destroy(string $id) {}
}
