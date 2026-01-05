<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Artisan;
use App\Models\Client;
use App\Models\Competences;
use App\Models\Langue;
use App\Models\Metier;
use App\Models\Pays;
use App\Models\User;
use App\Models\Ville;
use App\Models\ZoneService;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->has(Artisan::factory()->count(10))->create()->each(function ($user) {
        $competence = Competences::factory()->count(3)->create();
        $user->competences()->attach($competence);
    });
        User::factory()->count(10)->has(Client::factory()->count(10))->create();
        User::factory()->count(10)->has(Admin::factory()->count(2))->create();
      //  Competences::factory(20)->create();
        Langue::factory(20)->create();
        Metier::factory(20)->create();
        Ville::factory(20)->create();
        ZoneService::factory(20)->create();
        Pays::factory(20)->create();
    }
}
