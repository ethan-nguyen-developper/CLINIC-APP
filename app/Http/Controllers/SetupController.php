<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SetupController extends Controller
{
    public function index()
    {
        return Inertia::render('Setup/Index');
    }

    public function step1(Request $request)
    {
        $clinic = Clinic::create([
            'name' => $request->name,
            'description' => $request->description,
            'country' => $request->country,
            'city' => $request->city,
        ]);

        $request->user()->update([
            'clinic_id' => $clinic->id
        ]);

        return response()->json([
            'success' => true,
            'clinic' => $clinic
        ]);
    }
}