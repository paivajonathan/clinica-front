<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class AttendanceController extends Controller
{
    public function index(Request $request, int $patientId, int $consultationId)
    {
        $authData = $request->session()->get("authData");
    
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->route("login");
        }
    
        $patientResponse = Http::withToken($token)->get(config('app.api_url') . "/api/v1/users/patient/$patientId/");
        $consultationsResponse = Http::withToken($token)->get(config('app.api_url') . "/api/v1/consultations/$consultationId/");    

        if (!$patientResponse->successful() || !$consultationsResponse->successful()) {
            return redirect()->route("dashboard");
        }
        
        $patient = $patientResponse->json();
        $consultation = $consultationsResponse->json();

        return view("attendance", compact("patient", "consultation"));
    }

    public function store(Request $request)
    {
        $authData = $request->session()->get("authData");
    
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->route("login");
        }

        $data = [
            'observations' => $request->observations,
            'consultation_id' => $request->consultationId,
        ];

        $response = Http::withToken($token)->post(config('app.api_url') . '/api/v1/attendances/', $data);
        
        if ($response->successful()) {
            return redirect()->route('dashboard'); // Redireciona para a área logada
        }
        
        return redirect()->route('attendance')->withErrors(['error' => 'Unknown error']);
    }
}
