<?php

namespace App\Http\Controllers\Nurse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NurseDashboardController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $totalPatients = User::whereIn('role', ['student', 'teacher'])->count();
        $totalDoctors = User::where('role', 'doctor')->count();
        $totalNurses = User::where('role', 'nurse')->count();

        return view('nurse.index', compact('totalPatients', 'totalDoctors', 'totalNurses'));
    }
}
