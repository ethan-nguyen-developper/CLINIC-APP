<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use Inertia\Inertia;
use App\Models\Patient;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'stats' => [
                'clinics' => Clinic::count(),
                'patients' => Patient::count(),
            ]
        ]);
    }
}
