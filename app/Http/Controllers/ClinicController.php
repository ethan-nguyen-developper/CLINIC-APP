<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{

    public function step1(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'country' => 'nullable|string',
            'city' => 'nullable|string',
        ]);

        $clinic = Clinic::create($validated);

        // IMPORTANT: on garde l'id en session pour étape 2
        session(['clinic_id' => $clinic->id]);

        return redirect()->back();
    }

}