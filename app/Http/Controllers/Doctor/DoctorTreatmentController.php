<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;
use App\Models\HealthAssessment;
use Illuminate\Support\Facades\Auth;

class DoctorTreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::all();
        // whereNotIn('role', ['nurse', 'doctor'])->get();
        return view('admin.treatment.index', compact('treatments'));
    }

    // public function show($id)
    // {
    //     $treatment = Treatment::where('id', $id)->first();
    //     return view('admin.treatment.show', compact('treatment'));
    // }

    public function show($id)
    {
        $treatment = Treatment::with(['user', 'health_assessment'])->findOrFail($id);

        return view('admin.treatment.show', compact('treatment'));
    }
    public function edit($id)
    {
        $treatment = Treatment::where('health_assessment_id', $id)->first();

        return view('admin.treatment.edit-health-assessment', compact('treatment'));
    }
    public function update(Request $request, $id)
    {
        $healthAssessment = HealthAssessment::where('id', $id);

        $healthAssessment->update([
            'medical_history' => $request->medical_history,
            'medical_conditions' => $request->medical_conditions,
            'height' => $request->height,
            'weight' => $request->weight,
            'blood_pressure' => $request->blood_pressure,
            'heart_rate' => $request->heart_rate,
            'symptoms' => $request->symptoms,
            'allergies' => $request->allergies,
        ]);
        session()->flash('success', 'Health assessment updated successfully.');
        return redirect()->back()->with('success', 'Medical record updated successfully.');
    }
    public function destroy($treatment)
    {
        $treatment = Treatment::findOrFail($treatment);
        $treatment->delete();
        session()->flash('success', 'Treatment deleted successfully.');
        return redirect()->route('admin.treatment.index')->with('success', 'treatment deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $treatments = Treatment::where(function ($query) use ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('firstname', 'LIKE', "%{$search}%")
                    ->orWhere('lastname', 'LIKE', "%{$search}%");
            })
                ->orWhereHas('health_assessment', function ($q) use ($search) {
                    $q->where('medical_history', 'LIKE', "%{$search}%")
                        ->orWhere('medical_conditions', 'LIKE', "%{$search}%")
                        ->orWhere('blood_pressure', 'LIKE', "%{$search}%")
                        ->orWhere('symptoms', 'LIKE', "%{$search}%")
                        ->orWhere('allergies', 'LIKE', "%{$search}%");
                });
        })
            ->when(empty($search), function ($query) {
                return $query->limit(10);
            })
            ->get();

        return response()->json($treatments);
    }
}
