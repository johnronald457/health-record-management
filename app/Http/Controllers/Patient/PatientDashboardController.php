<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HealthAssessment;

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

            return view('patient.index', compact('user','fullName','healthData'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }
}
