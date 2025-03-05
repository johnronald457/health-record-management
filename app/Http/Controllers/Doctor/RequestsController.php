<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\HealthAssessment;
use App\Models\MedicalRequest;
use App\Models\Treatment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

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
        $treatment = Treatment::where('medical_id', $medical->id)->first();

        return view('admin.medical-input.show', compact('medical', 'treatment'));
    }

public function AI_Generate(Request $request): JsonResponse
{   
    $AI_Request = $request->input('findings');
    $apiKey = env('OPEN_API_KEY');

    $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])
        ->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'user', 'content' => $AI_Request],
            ],
            'max_tokens' => 50,
            'temperature' => 0.3,
        ]);
    // dd($response->json());

    // Check if the request was successful
    if ($response->successful()) {
        return response()->json($response->json(), 200); // Return the AI response as JSON
    } else {
        return response()->json([
            'error' => 'Unable to generate response',
            'details' => $response->body(),
        ], $response->status());
    }
}

    public function editComments($id)
    {
        $treatment = Treatment::findOrFail($id);
        return view('admin.medical-input.edit-comments', compact('treatment'));
    }

    public function updateComments(Request $request, $id)
    {
        $request->validate([
            'interpretation_comments' => 'required|string',
            'recommendations' => 'required|string',
            'prescriptions' => 'required|string',
            'result_summary' => 'required|string',
        ]);

        $treatment = Treatment::findOrFail($id);
        $treatment->update([
            'interpretation_comments' => $request->interpretation_comments,
            'recommendations' => $request->recommendations,
            'prescriptions' => $request->prescriptions,
            'result_summary' => $request->result_summary,
        ]);

        return redirect()->route('admin.requests.show', $treatment->id)->with('success', 'Doctor comments updated successfully.');
    }


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
    // Show the form for editing the specified request
    public function edit($id)
    {
        $medical = MedicalRequest::findOrFail($id);
        return view('admin.medical-input.edit', compact('medical'));
    }

    // Update the specified request in storage
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'request_type' => 'string',
            // 'status' => 'string',
            'condition' => 'string',
            'priority' => 'string',
            'test_date' => 'date',
            'findings' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Find the medical record by ID
        $medical = MedicalRequest::findOrFail($id);

        // Update the medical record with the validated data
        $medical->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('admin.requests.show', $medical->id)->with('success', 'Medical details updated successfully.');
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
