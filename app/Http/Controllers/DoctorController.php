<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DoctorController extends Controller
{
    public function index()
    {
        return Inertia::render('Doctors/Index', [
            'doctors' => Doctor::with('clinic')->latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Doctors/Create', [
            'clinics' => Clinic::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'speciality' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'clinic_id' => 'required|exists:clinics,id',
        ]);

        Doctor::create($validated);

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor created successfully');
    }

    public function edit(Doctor $doctor)
    {
        return Inertia::render('Doctors/Edit', [
            'doctor' => $doctor,
            'clinics' => Clinic::all()
        ]);
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'speciality' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'clinic_id' => 'required|exists:clinics,id',
        ]);

        $doctor->update($validated);

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor updated successfully');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor deleted successfully');
    }
}