<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Treatment;

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
            $treatment = Treatment::where('user_id', $user->id)->first();
    
            // Check if treatment data exists for the user
            if ($treatment) {
                return view('patient.treatment', compact('user', 'treatment'));
            } else {
                return response()->json(['error' => 'No treatment data found for this user'], 404);
            }
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }

    
}
