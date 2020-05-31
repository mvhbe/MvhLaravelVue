<?php

namespace Tests\Unit;

use App\Http\Resources\UitslagDetailResource;
use App\UitslagDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UitslagDetailResourceTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function heeftEenVolgorde()
    {
        $volgorde = 1;
        bewaarUitslagDetail(['volgorde' => $volgorde]);

        $uitslagDetailResource = UitslagDetailResource::collection(UitslagDetail::first()->get())->resolve();

        $this->assertEquals($volgorde, $uitslagDetailResource[0]["volgorde"]);
    }

    /** @test  */
    public function heeftEenGeformatteerdGewicht()
    {
        $gewicht = 6666;
        bewaarUitslagDetail(['gewicht' => $gewicht]);

        $uitslagDetailResource = UitslagDetailResource::collection(UitslagDetail::first()->get())->resolve();

        $this->assertEquals(formatteerGewicht($gewicht), $uitslagDetailResource[0]["gewicht"]);
    }

    /** @test  */
    public function heeftDeelnemers()
    {
        $deelnemers = 'Me, myself and I';
        bewaarUitslagDetail(['deelnemers' => $deelnemers]);

        $uitslagDetailResource = UitslagDetailResource::collection(UitslagDetail::first()->get())->resolve();

        $this->assertEquals($deelnemers, $uitslagDetailResource[0]["deelnemers"]);
    }

    /** @test  */
    public function heeftPlaatsen()
    {
        $plaatsen = '1, 2, 3';
        bewaarUitslagDetail(['plaatsen' => $plaatsen]);

        $uitslagDetailResource = UitslagDetailResource::collection(UitslagDetail::first()->get())->resolve();

        $this->assertEquals($plaatsen, $uitslagDetailResource[0]["plaatsen"]);
    }
}
