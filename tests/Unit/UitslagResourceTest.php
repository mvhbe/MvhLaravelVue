<?php

namespace Tests\Unit;

use App\Http\Resources\UitslagResource;
use App\Uitslag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UitslagResourceTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function heeftEenGeformatteerdTotaalGewicht()
    {
        $totaalGewicht = 66666;
        bewaarUitslag(['totaal_gewicht' => $totaalGewicht]);

        $uitslagResource = UitslagResource::collection(Uitslag::first()->get())->resolve();

        $this->assertEquals(formatteerGewicht($totaalGewicht), $uitslagResource[0]["totaal_gewicht"]);
    }

    /** @test  */
    public function heeftEenAantalDeelnemers()
    {
        $aantalDeelnemers = 66;
        bewaarUitslag(['aantal_deelnemers' => $aantalDeelnemers]);

        $uitslagResource = UitslagResource::collection(Uitslag::first()->get())->resolve();

        $this->assertEquals($aantalDeelnemers, $uitslagResource[0]["aantal_deelnemers"]);
    }

    /** @test  */
    public function heeftEenGeformatteerdGemiddeldGewicht()
    {
        $gemiddeldGewicht = 6666;
        bewaarUitslag(['gemiddeld_gewicht' => $gemiddeldGewicht]);

        $uitslagResource = UitslagResource::collection(Uitslag::first()->get())->resolve();

        $this->assertEquals(formatteerGewicht($gemiddeldGewicht), $uitslagResource[0]["gemiddeld_gewicht"]);
    }

    /** @test  */
    public function heeftUitslagDetail()
    {
        $uitslag = bewaarUitslag();
        $eersteUitslagDetail = bewaarUitslagDetail(["uitslag_id" => $uitslag->id, "volgorde" => 1]);
        $tweedeUitslagDetail = bewaarUitslagDetail(["uitslag_id" => $uitslag->id, "volgorde" => 2]);

        $uitslagResource = UitslagResource::collection(Uitslag::first()->get())->resolve();

        $this->assertDetailAanwezig($eersteUitslagDetail->toArray(), $uitslagResource[0]["details"][0]);
        $this->assertDetailAanwezig($tweedeUitslagDetail->toArray(), $uitslagResource[0]["details"][1]);
    }

    private function assertDetailAanwezig($verwachtUitslagDetail, $werkelijkeUitslagDetail)
    {
        $this->assertEquals($verwachtUitslagDetail["volgorde"], $werkelijkeUitslagDetail["volgorde"]);
        $this->assertEquals($verwachtUitslagDetail["gewicht"], $werkelijkeUitslagDetail["gewicht"]);
        $this->assertEquals($verwachtUitslagDetail["deelnemers"], $werkelijkeUitslagDetail["deelnemers"]);
        $this->assertEquals($verwachtUitslagDetail["plaatsen"], $werkelijkeUitslagDetail["plaatsen"]);
    }
}
