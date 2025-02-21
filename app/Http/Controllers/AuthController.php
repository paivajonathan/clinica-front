<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has("userData")) {
            return redirect()->to("login");
        }

        $userData = $request->session()->get("userData");

        if ($userData["user_role"]["user"]["role"] == "P") {
            return view("patient");
        } else {
            return view("doctor");
        }
    }
}
