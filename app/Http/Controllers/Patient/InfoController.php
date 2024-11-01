<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HealthAssessment;
use Carbon\Carbon;



class InfoController extends Controller
{
    public function getUserInfo()
    {
        $user = Auth::user();
        if ($user) {
            $userId = $user->id;
            $userName = $user->name;
            $userEmail = $user->email;
       
            $fullName = trim($user->firstname . ' ' . $user->middlename . ' ' . $user->lastname);
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

            // return view('patient.info', compact('user','fullName','healthData'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }

}
