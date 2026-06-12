<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClinicController extends Controller
{
    public function index(Request $request)
    {
        $query = Clinic::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        return Inertia::render('Clinics/Index', [
            'clinics' => $query->latest()->paginate(10),
            'filters' => $request->only('search')
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

        return redirect()->route('clinics.index')
            ->with('success', 'Clinic created successfully');

        return back()->withErrors([
            'name' => 'Name is required'
        ]);
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