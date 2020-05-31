<?php

namespace Tests\Unit;

use App\Http\Resources\WedstrijdResource;
use App\Wedstrijd;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WedstrijdResourceTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function heeftEenDatum()
    {
        $datum = date('Y-m-d');
        bewaarWedstrijd(['datum' => $datum]);

        $wedstrijdResource = WedstrijdResource::collection(Wedstrijd::first()->get())->resolve();

        $this->assertEquals($datum, $wedstrijdResource[0]["datum"]);
    }

    /** @test  */
    public function heeftEenOmschrijving()
    {
        $omschrijving = 'ledenwedstrijd';
        bewaarWedstrijd(['omschrijving' => $omschrijving]);

        $wedstrijdResource = WedstrijdResource::collection(Wedstrijd::first()->get())->resolve();

        $this->assertEquals($omschrijving, $wedstrijdResource[0]["omschrijving"]);
    }

    /** @test  */
    public function heeftEenAanvang()
    {
        $aanvang = date('H:i:s');
        bewaarWedstrijd(['aanvang' => $aanvang]);

        $wedstrijdResource = WedstrijdResource::collection(Wedstrijd::first()->get())->resolve();

        $this->assertEquals($aanvang, $wedstrijdResource[0]["aanvang"]);
    }

    /** @test  */
    public function heeftGeenUitslagBeschikbaar()
    {
        bewaarWedstrijd();

        $wedstrijdResource = WedstrijdResource::collection(Wedstrijd::first()->get())->resolve();

        $this->assertFalse($wedstrijdResource[0]["uitslag_beschikbaar"]);
    }

    /** @test  */
    public function heeftUitslagBeschikbaar()
    {
        $uitslag =bewaarUitslag();

        $wedstrijdResource = WedstrijdResource::collection(Wedstrijd::first()->get())->resolve();

        $this->assertTrue($wedstrijdResource[0]["uitslag_beschikbaar"]);
    }
}
