<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request): Response
    {
        // Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return response('logged out', 200);
    }
}
