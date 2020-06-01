<?php

use App\Wedstrijdtype;
use Illuminate\Database\Seeder;

class WedstrijdtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Wedstrijd',
            'Woensdagcriterium',
            'Zaterdagcriterium',
            'Zomercriterium',
            'Koppel met getrokken maat, apart vissen',
            'Interclub',
            'Jeugdvissen',
            'Evenement',
        ];

        foreach ($types as $type) {
            factory(Wedstrijdtype::class)->create(["omschrijving" => $type]);
        }
    }
}
