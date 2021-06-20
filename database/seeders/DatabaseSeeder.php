<?php

namespace Database\Seeders;

use Database\Seeders\ProductStatusSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(ProductStatusSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}