<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Str;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition(): array
    {
         return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'etat' => $this->faker->randomElement(['Ouvert', 'En cours', 'Résolu', 'Fermé']),
            'impact' => $this->faker->randomElement(['Mineur', 'Majeur', 'Critique', 'Bloquant']),
            'priorite' => $this->faker->randomElement(['Basse', 'Normale', 'Élevée', 'Urgente', 'Immédiate']),
            'systeme' => $this->faker->randomElement(['SQCA', 'BDT', 'SIGC', 'SGIA', 'Docflow', 'Ma Route', 'INSAF', 'OBTP']),
            'reproductibilite' => $this->faker->randomElement(['Toujours','Quelques fois','Aléatoire','Impossible à reproduire']),
            'categorie' => $this->faker->randomElement(['demande_assistance','demande_evolution','anomalie_applicative','parametrage','autre']),
            'user_id' => User::factory(),
            'tracking_code' => Str::random(10),
            'guest_name' => $this->faker->name,
            'guest_email' => $this->faker->email,
        ];
    }
}
