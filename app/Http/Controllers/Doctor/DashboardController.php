<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;  
use App\Models\HealthAssessment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Display a listing of the users
    public function index()
    {   $user = Auth::user();
        $totalPatients = User::whereIn('role', ['student', 'teacher'])->count();
        $totalDoctors = User::where('role', 'doctor')->count();
        $totalNurses = User::where('role', 'nurse')->count();
        $medicals = MedicalRequest::where('status', 'done')
                        ->where('condition', 'Unspecified')
                        ->get();

        $users = User::all();


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

        return view('admin.index', compact('totalPatients', 'totalDoctors', 'totalNurses', 'medicals', 'users', 'months', 'counts','topMedicalCondition'));
    }
}
