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
        $kalenders = Kalender::all()->each(
            function ($kalender)
            {
                $startDatum = Carbon::create($kalender->jaar, 3, 1, 0, 0, 0);
                foreach(range(1, random_int(15, 25)) as $aantalDagen) {
                    factory(Wedstrijd::class)->create(
                        [
                            "kalender_id" => $kalender->id,
                            "datum" => $startDatum->addDays($aantalDagen * 2)->format('Y-m-d'),
                            "omschrijving" => "Ledenwedstrijd MVH - " . $aantalDagen,
                            "aanvang" => "13:00:00"
                        ]
                    );
                }
            }
        );
    }
}
