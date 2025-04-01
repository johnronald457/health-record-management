<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use PDF;


class MedicalRequestController extends Controller
{
    // Show form for creating a new medical request
    public function index()
    {
        $userId = Auth::id();
        // Retrieve medical requests where the status is 'done' and filter by user ID
        $medicals = MedicalRequest::where('patient_id', $userId)
            ->where('status', 'done')
            ->where('condition', 'Non-sensitive')
            ->get();
        return view('patient.medical-result', compact('medicals'));
    }


    public function view($id)
    {
        $medicalResult = MedicalRequest::findOrFail($id);
        return view('patient.medical-result', compact('medicalResult'));
    }
    //     public function show(string $id)
    // {
    //     $patient = User::findOrFail($id);
    //     return view('patient.health-record-history', compact('patient'));
    // }
    public function generatePdf(string $id)
    {
        $medical_data = MedicalRequest::findOrFail($id);

        // Load the view and pass data to the PDF
        $pdf = PDF::loadView('pdf', compact('medical_data'));

        // Download the PDF file
        return $pdf->stream('medical_request_preview.pdf');
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
