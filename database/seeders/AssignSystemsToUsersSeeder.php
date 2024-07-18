<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AssignSystemsToUsersSeeder extends Seeder
{
    public function run()
    {
        $systemsByRole = [
            'Niv 1' => ['SQCA', 'BDT', 'SIGC'],
            'Niv 2' => ['SGIA', 'Docflow', 'INSAF', 'OBTP'],
            'Utilisateur standard' => ['Ma Route'],
            'Responsable' => ['SQCA', 'BDT', 'SIGC', 'SGIA', 'Docflow', 'Ma Route', 'INSAF', 'OBTP'],
        ];

        foreach (User::all() as $user) {
            $user->assigned_systems = $systemsByRole[$user->role] ?? [];
            $user->save();
        }
    }
    
}
