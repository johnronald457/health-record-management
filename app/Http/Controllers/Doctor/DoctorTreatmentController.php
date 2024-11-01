<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class DoctorTreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::all();
        // whereNotIn('role', ['nurse', 'doctor'])->get();
        return view('admin.treatment.index', compact('treatments'));
    }
    public function show($id)
    {
        $treatment = Treatment::findOrFail($id);
        return view('admin.treatment.show', compact('treatment'));
    }
    public function destroy($treatment)
    {
        $treatment = Treatment::findOrFail($treatment);
        $treatment->delete();
        session()->flash('success', 'Treatment deleted successfully.');
        return redirect()->route('admin.treatment.index')->with('success', 'treatment deleted successfully.');
    }
}
