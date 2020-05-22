<?php

use App\Kalender;
use Illuminate\Database\Seeder;

class KalendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voi
     */
    public function run()
    {
        foreach(range(date('Y') + 5, date('Y') - 5, -1) as $jaar) {
            factory(Kalender::class)->create(["jaar" => $jaar]);
        }
    }
}
