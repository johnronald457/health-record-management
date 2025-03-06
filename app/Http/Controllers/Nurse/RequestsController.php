<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $requests = MedicalRequest::where('status', 'request')->get();
        return view('admin.requests.index', compact('requests'));
    }
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
