<?php

namespace Database\Seeders;

use App\Models\Livre;
use Illuminate\Database\Seeder;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Livre::factory()->count(5)->create();

    }
}
