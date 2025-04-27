<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servis;

class ServisSeeder extends Seeder
{
    public function run()
    {
        Servis::factory()->count(20)->create();
    }
}
