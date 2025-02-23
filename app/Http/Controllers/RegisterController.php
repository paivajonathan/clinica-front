<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view("register");
    }

    public function store(Request $request)
    {
        $data = [
            "user" => [
                "username" => $request->username,
                "password" => $request->password,
                "email" => $request->email,
                "first_name" => $request->firstName,
                "last_name"=> $request->lastName,
            ],
            "patient" => [
                "birth_date" => $request->birthDate,
                "gender" => $request->gender,
                "phone" => $request->phone,
                "address" => $request->address,
            ]
        ];

        $response = Http::post(config('app.api_url') . '/api/v1/users/patient/register/', $data);

        if ($response->successful()) {
            return redirect()->route('login'); // Redireciona para a área logada
        }

        return redirect()->route('register')->withErrors(['error' => 'Unknown error']);
    }
}
