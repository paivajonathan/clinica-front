<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has("authData")) {
            return redirect()->to("login");
        }

        $userData = $request->session()->get("authData");

        if ($userData["user_role"]["user"]["role"] == "P")
        {
            return redirect()->to("patient");
        }
        else if ($userData["user_role"]["user"]["role"] == "D")
        {
            return redirect()->to("doctor");
        }

        return redirect()->to("login");
    }

    public function patient(Request $request)
    {
        // Retrieve session data
        $authData = $request->session()->get("authData");
    
        // Ensure token exists
        $token = $authData["token"] ?? null;
    
        if (!$token) {
            return redirect()->to("login");
        }
    
        // Make API request with Bearer token
        $response = Http::withToken($token)->get('http://localhost:8000/api/v1/users/?role=D');
    
        if ($response->successful()) {
            $doctors = $response->json();
        } else {
            $doctors = []; // Default to an empty array in case of failure
        }
    
        return view("dashboard-patient", compact("doctors"));
    }

    public function doctor(Request $request)
    {
        return view("dashboard-doctor");
    }
}
