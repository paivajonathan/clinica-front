<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class ConsultationController extends Controller
{
    public function index(Request $request, int $doctorId)
    {
        $authData = $request->session()->get("authData");
    
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->route("login");
        }
    
        $response = Http::withToken($token)->get("http://localhost:8000/api/v1/users/doctor/$doctorId/");
    
        if (!$response->successful()) {
            return redirect()->route("dashboard");
        }
        
        $doctor = $response->json();
        return view("consultation", compact("doctor"));
    }

    public function store(Request $request)
    {
        $authData = $request->session()->get("authData");
    
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->route("login");
        }

        $data = [
            'date' => $request->date,
            'time' => $request->time,
            'observations' => $request->observations,
            'doctor_id' => $request->doctorId,
        ];

        $response = Http::withToken($token)->post('http://localhost:8000/api/v1/consultations/', $data);
        
        if ($response->successful()) {
            return redirect()->route('dashboard'); // Redireciona para a área logada
        }
        
        return redirect()->route('consultation')->withErrors(['error' => 'Unknown error']);
    }

    public function cancel(Request $request, int $consultationId)
    {
        $authData = $request->session()->get("authData");
    
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->route("login");
        }

        $response = Http::withToken($token)->put("http://localhost:8000/api/v1/consultations/$consultationId/cancel/");
        
        if ($response->successful()) {
            return redirect()->route('dashboard'); // Redireciona para a área logada
        }
        
        return redirect()->route('dashboard')->withErrors(['error' => 'Unknown error']);
    }

    public function history(Request $request)
    {
        $authData = $request->session()->get("authData");
    
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->route("login");
        }

        $patientId = $authData["user_role"]["patient"]["id"];
    
        $response = Http::withToken($token)->get("http://localhost:8000/api/v1/consultations/?patient_id=$patientId");
    
        if (!$response->successful()) {
            return redirect()->route("dashboard");
        }
        
        $consultations = $response->json();
        return view("history", compact("consultations"));
    }

    public function doctorHistory(Request $request)
    {
        $authData = $request->session()->get("authData");
    
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->route("login");
        }

        $doctorId = $authData["user_role"]["doctor"]["id"];
    
        $response = Http::withToken($token)->get("http://localhost:8000/api/v1/consultations/?doctor_id=$doctorId");
    
        if (!$response->successful()) {
            return redirect()->route("dashboard");
        }
        
        $consultations = $response->json();
        return view("history-doctor", compact("consultations"));
    }
}
