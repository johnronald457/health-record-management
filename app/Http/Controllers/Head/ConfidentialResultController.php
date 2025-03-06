<?php

namespace App\Http\Controllers\Head;

use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ConfidentialResultController extends Controller
{
    public function index()
    {
        $medicals = MedicalRequest::all();
        $users = User::all();
        $medicals = MedicalRequest::whereIn('patient_id', $users->pluck('id'))
            ->where('status', 'done')
            ->where('condition', 'sensitive')
            ->get();
        return view('head.confidential-result.index', compact('medicals', 'users'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $patients = User::whereNotIn('role', ['nurse', 'doctor'])
            ->where(function ($query) use ($search) {
                $query->where('firstname', 'LIKE', "%{$search}%")
                    ->orWhere('lastname', 'LIKE', "%{$search}%")
                    ->orWhere('role', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('contact_no', 'LIKE', "%{$search}%");
            })
            ->get();
        return response()->json($patients);
    }

    public function show(string $id)
    {
        $patient = User::findOrFail($id);
        return view('head.confidential-result.show', compact('patient'));
    }
}
