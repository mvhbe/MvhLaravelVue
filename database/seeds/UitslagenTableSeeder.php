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
                $aantalDeelnemers = random_int(15, 20);
                $maxGewicht = random_int(33333, 66666);
                foreach(range(1, $aantalDeelnemers) as $volgorde) {
                    factory(Uitslag::class)->create(
                        [
                            "wedstrijd_id" => $wedstrijd->id,
                            "volgorde" => $volgorde,
                            "gewicht" => $maxGewicht,
                            "deelnemers" => "deelnemer " . $volgorde,
                            "plaatsen" => random_int(1, $aantalDeelnemers)
                        ]);
                    $volgendGewicht = random_int(1333, 2666);
                    $maxGewicht = $maxGewicht - $volgendGewicht < 0 ? 0 : $maxGewicht - $volgendGewicht;
                }
            }
        );
    }
}
