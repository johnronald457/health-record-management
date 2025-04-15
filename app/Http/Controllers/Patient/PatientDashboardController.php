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

            // Fetch the count of completed medicals per month
            $monthlyCounts = HealthAssessment::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->groupBy('month')
                ->orderBy('month')  // Ensure the months are ordered numerically
                ->get()
                ->pluck('count', 'month') // Pluck counts and months into an associative array
                ->toArray();

            // Month names for the chart
            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            // Ensure all months are represented in the chart, even if there are no medicals in some months
            $counts = [];
            for ($i = 1; $i <= 12; $i++) {
                $counts[] = isset($monthlyCounts[$i]) ? $monthlyCounts[$i] : 0;
            }

            // Fetch the top (most common) medical condition
            $topCondition = HealthAssessment::select('medical_conditions')
                ->selectRaw('COUNT(*) as count')
                ->groupBy('medical_conditions')
                ->orderByDesc('count')
                ->first();

            // Default to "N/A" if no record found
            $topMedicalCondition = $topCondition ? $topCondition->medical_conditions : 'N/A';
            return view('patient.index', compact('user','fullName','healthData', 'medicals', 'months', 'counts','topMedicalCondition'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }
}
