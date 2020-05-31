<?php

namespace Tests\Unit;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UitslagTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function heeftEenWedstrijdId()
    {
        $wedstrijd = bewaarWedstrijd();

        $uitslag = bewaarUitslag(["wedstrijd_id" => $wedstrijd->id]);

        $this->assertEquals($wedstrijd->id, $uitslag->wedstrijd_id);
    }

    /** @test */
    public function heeftEenWedstrijd()
    {
        $expectedWedstrijd = bewaarWedstrijd();
        $uitslag = bewaarUitslag(["wedstrijd_id" => $expectedWedstrijd->id]);

        $actualWedstrijd = $uitslag->wedstrijd;

        $this->assertEquals($expectedWedstrijd->toArray(), $actualWedstrijd->toArray());
    }

    /** @test  */
    public function heeftEenForeignKeyNaarWedstrijd()
    {
        $this->expectException(QueryException::class);

        $wedstrijd = bewaarWedstrijd();
        $uitslag = bewaarUitslag(["wedstrijd_id" => $wedstrijd->id]);

        $wedstrijd->delete();
    }

    /** @test */
    public function heeftEenTotaalGewicht()
    {
        $totaalGewicht = 666;
        $uitslag = bewaarUitslag(['totaal_gewicht' => $totaalGewicht]);

        $this->assertEquals($totaalGewicht, $uitslag->totaal_gewicht);
    }

    /** @test */
    public function heeftEenAantalDeelnemers()
    {
        $aantalDeelnemers = 66;
        $uitslag = bewaarUitslag(['aantal_deelnemers' => $aantalDeelnemers]);

        $this->assertEquals($aantalDeelnemers, $uitslag->aantal_deelnemers);
    }

    /** @test */
    public function heeftEenGemiddeldGewicht()
    {
        $gemiddeldGewicht = 666;
        $uitslag = bewaarUitslag(['gemiddeld_gewicht' => $gemiddeldGewicht]);

        $this->assertEquals($gemiddeldGewicht, $uitslag->gemiddeld_gewicht);
    }

    /** @test */
    public function heeftDetails()
    {
        $expectedUitslag = bewaarUitslag();
        $eersteUitslagDetail = bewaarUitslagDetail(["uitslag_id" => $expectedUitslag->id]);
        $tweedeUitslagDetail = bewaarUitslagDetail(["uitslag_id" => $expectedUitslag->id]);

        $actualUitslagDetails = $expectedUitslag->details->toArray();

        $this->assertCount(2, $actualUitslagDetails);
        $this->assertContains($eersteUitslagDetail->toArray(), $actualUitslagDetails);
        $this->assertContains($tweedeUitslagDetail->toArray(), $actualUitslagDetails);
    }

    /** @test */
    public function detailsGesorteerdOpVolgorde()
    {
        $expectedUitslag = bewaarUitslag();
        $eersteUitslagDetail = bewaarUitslagDetail(["uitslag_id" => $expectedUitslag->id, "volgorde" => 2]);
        $tweedeUitslagDetail = bewaarUitslagDetail(["uitslag_id" => $expectedUitslag->id, "volgorde" => 1]);

        $actualUitslagDetails = $expectedUitslag->details->toArray();

        $this->assertCount(2, $actualUitslagDetails);
        $this->assertEquals($tweedeUitslagDetail->toArray(), $actualUitslagDetails[0]);
        $this->assertEquals($eersteUitslagDetail->toArray(), $actualUitslagDetails[1]);
    }
}
