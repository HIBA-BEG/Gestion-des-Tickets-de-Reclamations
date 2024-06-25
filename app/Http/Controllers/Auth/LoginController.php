<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;




class LoginController extends Controller
{
    public function create(): View
    {
        return view("auth.login");
    }
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role == 'Niv 1' || $user->role == 'Niv 2') {
            return redirect()->route('indexTickets');
        } else if ($user->role == 'Utilisateur standard') {
            return redirect()->route('indexTickets');
        } else if ($user->role == 'Responsable') {
            return redirect()->route('indexTickets');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    // public function destroy(Request $request): RedirectResponse
    // {
    //     return view("auth.login");
    // }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
