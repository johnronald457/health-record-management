<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Treatment;
use App\Models\HealthAssessment;


class HealthAssessmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $fullName = trim($user->firstname . ' ' . $user->middlename . ' ' . $user->lastname);
            $health_records = Treatment::all()->get();
            return view('patient.health-record', compact('user', 'fullName', 'health_records'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        return view('patient.health-record');
    }

}
