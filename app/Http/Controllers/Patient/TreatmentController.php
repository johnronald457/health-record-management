<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Treatment;
use App\Models\HealthAssessment;

class TreatmentController extends Controller
{
    
    public function index()
    {
        $treatments = Treatment::all();
        return view('patient.treatment', compact('treatments'));
    }

    public function getUserTreatment()
    {
        $user = Auth::user();
        if ($user) {
            
            $fullName = trim($user->firstname . ' ' . $user->middlename . ' ' . $user->lastname);
            $treatment = Treatment::where('user_id', $user->id)->first();
            $healthData = HealthAssessment::where('user_id', $user->id)->first();
            
            return view('patient.treatment', compact('user', 'treatment', 'fullName', 'healthData'));
                
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }

    
}
