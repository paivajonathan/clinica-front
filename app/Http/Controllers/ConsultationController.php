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
}
