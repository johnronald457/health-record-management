<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;
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

    // Example for fetching orders count per month
    $status = 'done';  // You can replace this with 'done', 'finalized', etc.

    // Fetch the count of completed medicals per month
    $monthlyCounts = MedicalRequest::where('status', $status)
        ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->orderBy('month')  // Ensure the months are ordered numerically
        ->get()
        ->pluck('count', 'month') // Pluck counts and months into an associative array
        ->toArray();

    // Month names for the chart
    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    // Ensure all months are represented in the chart, even if there are no medicals in some months
    // If a month doesn't exist in the data, fill it with 0
    $counts = [];
    for ($i = 1; $i <= 12; $i++) {
        // If the month exists in the fetched data, use its count; otherwise, default to 0
        $counts[] = isset($monthlyCounts[$i]) ? $monthlyCounts[$i] : 0;
    }

        return view('admin.index', compact('totalPatients', 'totalDoctors', 'totalNurses', 'medicals', 'users', 'months', 'counts'));
    }
}
