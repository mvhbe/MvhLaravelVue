<?php

use App\Uitslag;
use App\UitslagDetail;
use Illuminate\Database\Seeder;

class UitslagDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Uitslag::all()->each(
            function ($uitslag) {
                $totaalBerekenGewicht = 0;
                $gewicht = $this->berekenRandomGewicht(
                    $uitslag->totaal_gewicht, $uitslag->gemiddeld_gewicht, $totaalBerekenGewicht
                );
                foreach(range(1, $uitslag->aantal_deelnemers) as $volgorde) {
                    factory(UitslagDetail::class)->create(
                        [
                            "uitslag_id" => $uitslag->id,
                            "volgorde" => $volgorde,
                            "gewicht" => $gewicht,
                            "deelnemers" => "deelnemer " . $volgorde,
                            "plaatsen" => random_int(1, $uitslag->aantal_deelnemers)
                        ]);
                    $totaalBerekenGewicht = $totaalBerekenGewicht + $gewicht;
                    $gewicht = $this->berekenRandomGewicht(
                        $uitslag->totaal_gewicht, $uitslag->gemiddeld_gewicht, $totaalBerekenGewicht
                    );
                }
            }
        );
    }

    /**
     * @param int $totaalGewicht
     * @param int $gemiddeldGewicht
     * @param $berekendGewicht
     * @return int
     * @throws Exception
     */
    private function berekenRandomGewicht(int $totaalGewicht, int $gemiddeldGewicht, $berekendGewicht): int
    {
        $nieuwGewicht = random_int($gemiddeldGewicht - 333, $gemiddeldGewicht + 666);
        return $berekendGewicht + $nieuwGewicht >= $totaalGewicht ? $totaalGewicht - $berekendGewicht : $nieuwGewicht;
    }
}
