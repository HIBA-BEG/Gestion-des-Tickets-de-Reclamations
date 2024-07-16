<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    public function all()
    {
        $users = DB::table('users')
            ->where('role', '!=', 'Responsable')
            
            ->get();
        return view('AllUsers', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'role' => 'required|in:Responsable,Utilisateur standard,Niv 1,Niv 2',
        ]);

        $user->role = $validatedData['role'];
        $user->save();

        return response()->json(['success' => true]);
    }
    public function toggleArchive(User $user)
    {
        $user->archived = !$user->archived;
        $user->save();

        $action = $user->archived ? 'archived' : 'unarchived';
        return response()->json(['success' => true, 'message' => "User {$action} successfully"]);
    }
}
