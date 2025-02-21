<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view("login");
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
