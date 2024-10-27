<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function getUserInfo()
    {
        $user = Auth::user();
        if ($user) {
            $userId = $user->id;
            $userName = $user->name;
            $userEmail = $user->email;
       
            return view('patient.info', compact('user'));
        } else {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    }

}
