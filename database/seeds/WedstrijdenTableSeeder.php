<?php

use App\Kalender;
use App\Wedstrijd;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WedstrijdenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kalenders = Kalender::all();
        foreach ($kalenders as $kalender) {
            $startDatum = Carbon::create($kalender->jaar, 3, 1, 0, 0, 0);
            foreach(range(1, 15) as $aantalDagen) {
                factory(Wedstrijd::class)->create(
                    ["kalender_id" => $kalender->id, "datum" => $startDatum->addDays($aantalDagen)->format('Y-m-d')]
                );
            }
        }
    }
}
