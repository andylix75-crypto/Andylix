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
        User::factory()->count(3)->has(Artisan::factory()->count(3))->create();
    //     ->each(function ($user) {
    //     $competence = Competences::factory()->count(3)->create();
    //     $user->competences()->attach($competence);
    // });
        User::factory()->count(2)->has(Client::factory()->count(2))->create();
        User::factory()->count(2)->has(Admin::factory()->count(2))->create();
        Competences::factory(2)->create();
        Langue::factory(4)->create();
        Metier::factory(4)->create();
        Ville::factory(4)->create();
        ZoneService::factory(4)->create();
        Pays::factory(4)->create();
    }
}
