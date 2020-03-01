<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLogin;
use App\LoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Facades\Agent;

class AdminController extends Controller
{
    public function login(AdminLogin $login)
    {
        $login->validated();
        if (Auth::attempt(['email' => $login->input('email'), 'password' => $login->input('password'), 'status' => 1])) {
            LoginHistory::create(
                [
                    'admin_id'    => Auth::user()->id,
                    'ip'          => $login->ip(),
                    'remote_host' => $login->getHttpHost(),
                    'so'          => Agent::platform(),
                    'navigator'   => Agent::browser(),
                ]
            );
            return response(['auth' => Auth::user()->name]);
        } else {
            return response(['message' => 'Usuario no encontrado'], 422);
        }
    }
}
