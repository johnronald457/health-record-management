<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\HealthAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HealthAssessmentController extends Controller
{
    public function getHealthRecord()
    {
        $user = Auth::user();
        if ($user) {
            // Assuming these fields exist in the users table
            $fullName = trim($user->firstname . ' ' . $user->middlename . ' ' . $user->lastname);
    
            // Fetch health data from the database
            $healthData = HealthAssessment::where('user_id', $user->id)->first();
    
            return view('patient.health-record', compact('user', 'fullName', 'healthData'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HealthAssessment $healthAssessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthAssessment $healthAssessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthAssessment $healthAssessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthAssessment $healthAssessment)
    {
        //
    }
}
