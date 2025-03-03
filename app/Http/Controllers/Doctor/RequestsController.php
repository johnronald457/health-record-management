<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $medicals = MedicalRequest::all();
        $users = User::all();
        return view('admin.medical-input.index', compact('medicals', 'users'));
    }

    public function show($id)
    {
        $medical = MedicalRequest::findOrFail($id);
        return view('admin.medical-input.show', compact('medical'));
    }


    //     public function show($id)
    // {
    //     $patient = User::findOrFail($id);
    //     return view('admin.patient.show', compact('patient'));
    // }

    public function store(Request $request)
        {
        $validated = $request->validate([
            'patient_id' => 'required|exists:users,id', // Ensure the patient exists
            'request_type' => 'required|string|max:255',
            'priority' => 'required|string|in:low,medium,high',
            'preferred_date' => 'required|date',
        ]);

        // Create the new MedicalRequest record
        $medicalRequest = new MedicalRequest([
            'patient_id' => $request->input('patient_id'),
            'request_type' => $request->input('request_type'),
            'priority' => $request->input('priority'),
            'preferred_date' => $request->input('preferred_date'),
            // You can add other fields here if needed (e.g., 'description', 'status', etc.)
        ]);

        // Save the MedicalRequest to the database
        $medicalRequest->save();

        // Redirect or return response
        return redirect()->back()->with('success', 'Medical request created successfully!');
    }


    // Method to return users for the searchable dropdown
    public function search(Request $request)
    {
        // Validate the search query
        $query = $request->get('q');

        // Fetch users based on the search query
        $users = User::where('name', 'LIKE', '%' . $query . '%')
            ->limit(10) // Limit the number of results
            ->get();

        // Return the users in a format suitable for Select2
        return response()->json($users->map(function ($user) {
            return [
                'id' => $user->id,
                'text' => $user->name, // Display user's name
            ];
        }));
    }
    // // Display the specified user
    // public function show($id)
    // {
    //     $user = User::findOrFail($id); // Find user or throw 404
    //     return view('users.show', compact('user'));
    // }

    // Show the form for editing the specified user
    public function approve($id)
    {
        $request = MedicalRequest::findOrFail($id);
        $request->status = 'approved';
        $request->save();

        return redirect()->back()->with('success', 'Request has been approved successfully');
    }

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
    public function destroy($request)
    {
        $request = MedicalRequest::findOrFail($request);
        $request->delete();
        session()->flash('success', 'Request deleted successfully.');
        return redirect()->route('admin.requests.index')->with('success', 'Request deleted successfully.');
    }
}
