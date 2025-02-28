<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class NursePatientController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $patients = User::whereNotIn('role', ['nurse', 'doctor'])->get();
        return view('nurse.patient.index', compact('patients'));
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

    public function show($id)
    {
        $patient = User::findOrFail($id);
        return view('nurse.patient.show', compact('patient'));
    }


    // // Show the form for creating a new user
    // public function create()
    // {
    //     return view('users.create');
    // }

    // // Store a newly created user in storage
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     // Create a new user
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password), // Hash the password
    //     ]);

    //     return redirect()->route('users.index')->with('success', 'User created successfully.');
    // }

    // // Display the specified user
    // public function show($id)
    // {
    //     $user = User::findOrFail($id); // Find user or throw 404
    //     return view('users.show', compact('user'));
    // }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('nurse.patient.edit', compact('user'));
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'contact_no' => 'required|string|max:255',
            'emergency_contact' => 'required|string|max:255',
        ]);
        $user = User::findOrFail($id);
        $user->fill($validatedData);
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    // Remove the specified user from storage
    public function destroy($patient)
    {
        $user = User::findOrFail($patient);
        $user->delete();
        session()->flash('success', 'Patient deleted successfully.');
        return redirect()->route('nurse.patient.index');
    }
}
