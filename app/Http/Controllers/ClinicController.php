<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClinicController extends Controller
{
    public function index()
    {
        return Inertia::render('Clinics/Index', [
            'clinics' => Clinic::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Clinics/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
        ]);

        Clinic::create($validated);

        return redirect()->route('clinics.index');
    }

    public function edit(Clinic $clinic)
    {
        return Inertia::render('Clinics/Edit', [
            'clinic' => $clinic
        ]);
    }

    public function update(Request $request, Clinic $clinic)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
        ]);

        $clinic->update($validated);

        return redirect()->route('clinics.index');
    }

    public function destroy(Clinic $clinic)
    {
        $clinic->delete();

        return redirect()->route('clinics.index');
    }
}