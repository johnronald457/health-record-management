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

        return view('admin.index', compact('totalPatients', 'totalDoctors', 'totalNurses', 'medicals', 'users'));
    }
}
