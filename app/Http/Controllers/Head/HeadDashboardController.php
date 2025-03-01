<?php

namespace App\Http\Controllers\Head;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HeadDashboardController extends Controller
{
    public function index()
    {
        $totalPatients = User::whereIn('role', ['student', 'teacher'])->count();
        $totalDoctors = User::where('role', 'doctor')->count();
        $totalNurses = User::where('role', 'nurse')->count();

        return view('head.index', compact('totalPatients', 'totalDoctors', 'totalNurses'));
    }
}
