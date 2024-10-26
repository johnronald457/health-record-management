<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $patients = User::whereNotIn('role', ['nurse', 'doctor'])->get();
        return view('admin.patient.index', compact('patients'));
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

    // // Show the form for editing the specified user
    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('users.edit', compact('user'));
    // }

    // // Update the specified user in storage
    // public function update(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,' . $user->id,
    //         'password' => 'nullable|string|min:8|confirmed',
    //     ]);

    //     $user->name = $request->name;
    //     $user->email = $request->email;
        
    //     if ($request->filled('password')) {
    //         $user->password = bcrypt($request->password);
    //     }

    //     $user->save();

    //     return redirect()->route('users.index')->with('success', 'User updated successfully.');
    // }

    // Remove the specified user from storage
    public function destroy($patient)
    {
        $user = User::findOrFail($patient);
        $user->delete();

        return redirect()->route('admin.patient.index')->with('success', 'Patient deleted successfully.');
    }
}
