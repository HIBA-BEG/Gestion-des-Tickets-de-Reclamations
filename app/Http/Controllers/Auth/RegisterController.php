<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;


class RegisterController extends Controller
{
    
    public function create(): View
    {
        $userCount = User::count();
        return view('auth.register', compact('userCount'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => 'required|same:password',
            'role' => ['required'],
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'assigned_systems' => $this->getAssignedSystems($request->role),
        ]);

        event(new Registered($user));

        return redirect()->back()->with('success', 'Utilisateur ajouté avec succès');
    }

    protected function getAssignedSystems($role)
    {
        $systemsByRole = [
            'Niv 1' => ['SQCA', 'BDT', 'SIGC', 'SGIA', 'Docflow', 'Ma Route', 'INSAF', 'OBTP'],
            'Niv 2' => ['SQCA', 'BDT', 'SIGC', 'SGIA', 'Docflow', 'Ma Route', 'INSAF', 'OBTP'],
            'Responsable' => ['SQCA', 'BDT', 'SIGC', 'SGIA', 'Docflow', 'Ma Route', 'INSAF', 'OBTP'],
        ];

        return $systemsByRole[$role] ?? [];
    }
}
