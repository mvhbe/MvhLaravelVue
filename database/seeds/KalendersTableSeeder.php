<?php

use App\Kalender;
use Illuminate\Database\Seeder;

class KalendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(2020, 2000, -1) as $jaar) {
            factory(Kalender::class)->create(["jaar" => $jaar]);
        }
    }
}
