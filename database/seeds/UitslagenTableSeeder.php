<?php

use App\Uitslag;
use App\Wedstrijd;
use Illuminate\Database\Seeder;

class UitslagenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wedstrijd::all()->each(
            function ($wedstrijd) {
                $totaalGewicht = random_int(66666, 99999);
                $aantalDeelnemers = random_int(15, 20);
                factory(Uitslag::class)->create(
                    [
                        "wedstrijd_id" => $wedstrijd->id,
                        "totaal_gewicht" => $totaalGewicht,
                        "aantal_deelnemers" => $aantalDeelnemers,
                        "gemiddeld_gewicht" => $totaalGewicht / $aantalDeelnemers
                    ]
                );
            }
        );
    }
}
