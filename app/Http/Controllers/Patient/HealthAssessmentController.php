<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\HealthAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HealthAssessmentController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        if ($user) {
            // Assuming these fields exist in the users table
            $fullName = trim($user->firstname . ' ' . $user->middlename . ' ' . $user->lastname);
    
            return view('patient.create-health-assessment', compact('user', 'fullName'));
            // return view('patient.info', compact('user', 'fullName', 'healthData'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        return view('patient.create-health-assessment');
    }

    public function getHealthRecord()
    {
        $user = Auth::user();
        if ($user) {
            $fullName = trim($user->firstname . ' ' . $user->middlename . ' ' . $user->lastname);
    
            // Fetch health data from the database
            // $healthData = HealthAssessment::where('user_id', $user->id)->first();
            // $lastAssessmentDate = $healthData->created_at;
            // $showCreateButton = $lastAssessmentDate->diffInMonths(now()) >= 1;

            // Fetch health data from the database
            $healthData = HealthAssessment::where('user_id', $user->id)->first();
            $showCreateButton = false;

            if ($healthData) {
                // Calculate the time difference if health data exists
                $lastAssessmentDate = $healthData->created_at;
                $showCreateButton = $lastAssessmentDate->diffInMonths(now()) >= 1;
            } else {
                // Set to true to show the "Create New Assessment" button if no record exists
                $showCreateButton = true;
            }
            
            return view('patient.info', compact('user', 'fullName', 'healthData', 'showCreateButton'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }
    
    public function store(Request $request)
    {
        HealthAssessment::create([
            'user_id' => Auth::id(), 
            'medical_history' => $request->medical_history,
            'medical_conditions' => $request->medical_conditions,
            'height' => $request->height,
            'weight' => $request->weight,
            'blood_pressure' => $request->blood_pressure,
            'heart_rate' => $request->heart_rate,
            'symptoms' => $request->symptoms,
            'allergies' => $request->allergies,
        ]);

        return redirect()->route('patient.health-assessment')->with('success', 'Medical request created successfully.');
    }

    public function edit($id)
    {
        // Retrieve the health assessment record by ID and confirm it's the current user's record
        $healthAssessment = HealthAssessment::where('user_id', Auth::id())->findOrFail($id);

        return view('patient.edit-health-assessment', compact('healthAssessment'));


        
        $user = Auth::user();
        if ($user) {
            // Assuming these fields exist in the users table
            $fullName = trim($user->firstname . ' ' . $user->middlename . ' ' . $user->lastname);
    
            // Fetch health data from the database
            $healthAssessment = HealthAssessment::where('user_id', $user->id)->first();
    
            // return view('patient.health-assessment', compact('user', 'fullName', 'healthData'));
            return view('patient.edit-health-assessment', compact('user', 'fullName', 'healthAssessment'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }
    
    public function update(Request $request, $id)
    {
        $healthAssessment = HealthAssessment::where('user_id', Auth::id())->findOrFail($id);

        $healthAssessment->update([
            'medical_history' => $request->medical_history,
            'medical_conditions' => $request->medical_conditions,
            'height' => $request->height,
            'weight' => $request->weight,
            'blood_pressure' => $request->blood_pressure,
            'heart_rate' => $request->heart_rate,
            'symptoms' => $request->symptoms,
            'allergies' => $request->allergies,
        ]);

        return redirect()->route('patient.health-assessment');
        // ->with('success', 'Medical record updated successfully.');
    }

    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
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
     * Remove the specified resource from storage.
     */
    public function destroy(HealthAssessment $healthAssessment)
    {
        //
    }
}
