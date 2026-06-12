<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use Inertia\Inertia;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'stats' => [
                'clinics' => Clinic::count(),
                'doctors' => Doctor::count(),
                'patients' => Patient::count(),
                'appointments' => Appointment::count(),
            ]
        ]);
    }
}
