<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HealthAssessment;
use App\Models\MedicalRequest;

class PatientDashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if ($user) {
            $userId = $user->id;
            $userEmail = $user->email;
       
            $fullName = trim($user->firstname . ' ' . $user->middlename . ' ' . $user->lastname);
            $healthData = HealthAssessment::where('user_id', $user->id)->first();
            $medicals = MedicalRequest::where('patient_id', $userId)
                               ->where('status', 'pending')
                               ->where('condition', 'Unspecified')
                               ->whereNotNull('schedule_date')
                               ->get();
            return view('patient.index', compact('user','fullName','healthData', 'medicals'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }
}
