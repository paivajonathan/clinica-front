<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class ConsultationController extends Controller
{
    public function index(Request $request, int $doctorId)
    {
        // Retrieve session data
        $authData = $request->session()->get("authData");
    
        // Ensure token exists
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->to("login");
        }
    
        // Make API request with Bearer token
        $response = Http::withToken($token)->get("http://localhost:8000/api/v1/users/$doctorId");
    
        if ($response->successful()) {
            $doctor = $response->json();
        } else {
            $doctors = []; // Default to an empty array in case of failure
        }
    
        return view("dashboard-patient", compact("doctors"));
    }

    public function store(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        $response = Http::post('http://localhost:8000/api/v1/auth/token/', $credentials);
        
        if ($response->successful()) {
            session(['authData' => $response->json()]);
            return redirect()->route('dashboard'); // Redireciona para a área logada
        }
        
        return redirect()->route('login')->withErrors(['error' => 'Unknown error']);
    }
}
