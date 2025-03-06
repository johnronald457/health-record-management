<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Treatment;
use App\Models\HealthAssessment;
use App\Models\MedicalRequest;

class HealthRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = User::whereNotIn('role', ['nurse', 'doctor', 'head'])->get();
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
        {       $patient = User::where('id', $id)->first();
                $fullName = trim($patient->firstname . ' ' . $patient->middlename . ' ' . $patient->lastname);
                $health_records = Treatment::all();
                $healthData = HealthAssessment::where('user_id', $patient->id)->first();
                $medicals = MedicalRequest::where('patient_id', $patient->id)
                                ->where('status', 'done')
                                ->get();
        return view('patient.health-record-history', compact('fullName', 'health_records', 'patient' , 'healthData', 'medicals'));
    }

    public function index_patient()
    {
        $user = Auth::user();
        if ($user) {
            $fullName = trim($user->firstname . ' ' . $user->middlename . ' ' . $user->lastname);
            $patient = User::where('id', $user->id)->first();
            $health_records = Treatment::all();
            $healthData = HealthAssessment::where('user_id', $user->id)->first();
            $medicals = MedicalRequest::where('patient_id', $user->id)
                            ->where('status', 'done')
                            ->where('condition', 'Non-sensitive')
                            ->get();
            return view('patient.health-record', compact('user', 'fullName', 'health_records', 'patient' , 'healthData', 'medicals'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        return view('patient.health-record');
    }


    public function edit(string $id) {}


    public function update(Request $request, string $id) {}


    public function destroy(string $id) {}
}
