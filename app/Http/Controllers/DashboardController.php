<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has("authData")) {
            return redirect()->route("login");
        }

        $userData = $request->session()->get("authData");

        if ($userData["user_role"]["user"]["role"] == "P")
        {
            return redirect()->route("patient");
        }
        else if ($userData["user_role"]["user"]["role"] == "D")
        {
            return redirect()->route("doctor");
        }

        return redirect()->route("login");
    }

    public function patient(Request $request)
    {
        // Retrieve session data
        $authData = $request->session()->get("authData");
    
        // Ensure token exists
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->route("login");
        }

        $patientId = $authData["user_role"]["patient"]["id"];
    
        // Make API request with Bearer token    
        $doctorsResponse = Http::withToken($token)->get(config('app.api_url') . '/api/v1/users/doctors/?has_pending_consultation=false');
        $pendingConsultationsResponse = Http::withToken($token)->get(config('app.api_url') . "/api/v1/consultations/?patient_id=$patientId&status=S");
    
        // Assign results, default to empty array in case of failure
        $doctors = $doctorsResponse->successful() ? $doctorsResponse->json() : [];
        $pendingConsultations = $pendingConsultationsResponse->successful() ? $pendingConsultationsResponse->json() : [];
    
        return view("dashboard-patient", compact("doctors", "pendingConsultations"));
    }

    public function doctor(Request $request)
    {
        // Retrieve session data
        $authData = $request->session()->get("authData");
    
        // Ensure token exists
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->route("login");
        }

        $doctorId = $authData["user_role"]["doctor"]["id"];
    
        $pendingConsultationsResponse = Http::withToken($token)->get(config('app.api_url') . "/api/v1/consultations/?doctor_id=$doctorId&status=S");
    
        $pendingConsultations = $pendingConsultationsResponse->successful() ? $pendingConsultationsResponse->json() : [];
    
        return view("dashboard-doctor", compact("pendingConsultations"));
    }
}
