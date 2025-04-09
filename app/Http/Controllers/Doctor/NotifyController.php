<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;

use App\Models\NotifyStudent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;

class NotifyController extends Controller
{
    public function index()
    {
        // Fetch all notify_students records
        $notifyStudents = NotifyStudent::all();

        // Return the index view with the fetched records
        return view('admin.notify-student.index', compact('notifyStudents'));
    }

    public function patient_index()
    {   
        $user = auth()->user();
        // Fetch all notify_students records
       $notifyStudents = NotifyStudent::where('patient_id', $user->id)->get();

        // Return the index view with the fetched records
        return view('patient.notification', compact('notifyStudents'));
    }

    public function agree($id)
    {
        // Find the NotifyStudent record by its ID
        $notifyStudent = NotifyStudent::findOrFail($id);

        // Set the decision to 'yes'
        $notifyStudent->decision = 'yes';

        // Save the updated record
        $notifyStudent->save();

        // Redirect back with a success message
        return redirect()->route('patient.notication')->with('success', 'Notification decision updated to "Yes".');
    }

    public function decline(Request $request, $id)
    {
        // Find the NotifyStudent record
        $notifyStudent = NotifyStudent::findOrFail($id);

        // Validate the input
        $validated = $request->validate([
            'contact_no' => 'required|string|max:15',
        ]);

        // Update the decision to 'no' and save the contact number
        $notifyStudent->decision = 'no';
        $notifyStudent->contact_no = $validated['contact_no'];
        $notifyStudent->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Notification declined successfully.');
    }
    


    public function create()
    {   
        $users = User::all();
        // Return the create view (form to create a new notify student)
        return view('admin.notify-student.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:users,id',
            'target_date' => 'nullable|date',
            'description' => 'nullable|string|max:255',
            'decision' => 'required|in:pending,yes,no',
            'contact_no' => 'nullable|string|max:15',
        ]);

        // Create a new NotifyStudent record
        NotifyStudent::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('notify_students.index')->with('success', 'Notify student created successfully.');
    }

    public function show(NotifyStudent $notifyStudent)
    {   

        // Return the show view with the specific notify student
        return view('notify_students.show', compact('notifyStudent'));
    }

    public function edit(NotifyStudent $notifyStudent)
    {   
        $users = User::all();
        // Return the edit view with the specific notify student
        return view('admin.notify-student.edit', compact('notifyStudent', 'users'));
    }

    public function update(Request $request, NotifyStudent $notifyStudent)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            // 'patient_id' => 'required|exists:users,id',
            'target_date' => 'nullable|date',
            'description' => 'nullable|string|max:255',
            'decision' => 'required|in:pending,yes,no',
            'contact_no' => 'nullable|string|max:15',
        ]);

        // Update the NotifyStudent record
        $notifyStudent->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('notify_students.index')->with('success', 'Notify student updated successfully.');
    }

    public function destroy(NotifyStudent $notifyStudent)
    {
        // Delete the specific NotifyStudent record
        $notifyStudent->delete();

        // Redirect to the index page with a success message
        return redirect()->route('admin.notify-student.index')->with('success', 'Notify student deleted successfully.');
    }
}
