<?php

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
        $this->call(WedstrijdtypeTableSeeder::class);
        $this->call(KalendersTableSeeder::class);
        $this->call(WedstrijdenTableSeeder::class);
        $this->call(UitslagenTableSeeder::class);
        $this->call(UitslagDetailsTableSeeder::class);
    }
}
