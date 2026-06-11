<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patient::with('clinic');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->search}%")
                  ->orWhere('last_name', 'like', "%{$request->search}%")
                  ->orWhere('phone', 'like', "%{$request->search}%");
            });
        }

        if ($request->clinic_id) {
            $query->where('clinic_id', $request->clinic_id);
        }

        return Inertia::render('Patients/Index', [
            'patients' => $query->latest()->paginate(10),
            'clinics' => Clinic::all(),
            'filters' => $request->only(['search', 'clinic_id'])
        ]);
    }

    public function create()
    {
        return Inertia::render('Patients/Create', [
            'clinics' => Clinic::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'nullable',
            'birthdate' => 'nullable|date',
            'clinic_id' => 'required|exists:clinics,id',
        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')
            ->with('success', 'Patient created successfully');
    }

    public function edit(Patient $patient)
    {
        return Inertia::render('Patients/Edit', [
            'patient' => $patient,
            'clinics' => Clinic::all()
        ]);
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'nullable',
            'birthdate' => 'nullable|date',
            'clinic_id' => 'required|exists:clinics,id',
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')
            ->with('success', 'Patient updated successfully');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient deleted successfully');
    }
}