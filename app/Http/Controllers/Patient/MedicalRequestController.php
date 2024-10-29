<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRequestController extends Controller
{
    // Show form for creating a new medical request
    public function create()
    {
        return view('patient.medical-request');
    }

    // Store a new medical request
    public function store(Request $request)
    {
        MedicalRequest::create([
            'patient_id' => Auth::id(), // Assuming the patient is the currently authenticated user
            'preferred_date' => $request->preferred_date,
            'notes' => $request->notes,
        ]);

        return redirect()->route('patient.medical-request')->with('success', 'Medical request created successfully.');
    }
}
