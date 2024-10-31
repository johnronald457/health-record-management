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

            return view('patient.info', compact('user','fullName','healthData'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }

}
