<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;



class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')) {
            return view(
                'pages.admin.dashboard',
                [
                    "menu" => "dashboard",
                    "active" => "dashboard"
                ]
            );
        } else {
            return redirect('/');
        }
    }

    public function login()
    {
        if (Auth::user()) {

            if (Auth::user()->hasRole('user')) {
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                return view('pages.admin.login', [
                    "title" => "Home",
                    "active" => "home"
                ]);
            }
        }

        return view('pages.admin.login', [
            "title" => "Home",
            "active" => "home"
        ]);
    }
}
