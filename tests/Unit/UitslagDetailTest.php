<?php

namespace Tests\Unit;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UitslagDetailTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function heeftEenUitslagId()
    {
        $uitslag = bewaarUitslag();

        $uitslagDetail = bewaarUitslagDetail(["uitslag_id" => $uitslag->id]);

        $this->assertEquals($uitslagDetail->uitslag_id, $uitslag->id);
    }

    /** @test */
    public function heeftEenUitslag()
    {
        $expectedUitslag = bewaarUitslag();
        $uitslagDetail = bewaarUitslagDetail(["uitslag_id" => $expectedUitslag->id]);

        $actualUitslag = $uitslagDetail->uitslag;

        $this->assertEquals($expectedUitslag->toArray(), $actualUitslag->toArray());
    }

    /** @test  */
    public function heeftEenForeignKeyNaarUitslag()
    {
        $this->expectException(QueryException::class);

        $uitslag = bewaarUitslag();
        bewaarUitslagDetail(["uitslag_id" => $uitslag->id]);

        $uitslag->delete();
    }

    /** @test */
    public function heeftEenVolgorde()
    {
        $volgorde = 1;
        $uitslagDetail = bewaarUitslagDetail(['volgorde' => $volgorde]);

        $this->assertEquals($volgorde, $uitslagDetail->volgorde);
    }

    /** @test */
    public function heeftEenGewicht()
    {
        $gewicht = 666;
        $uitslagDetail = bewaarUitslagDetail(['gewicht' => $gewicht]);

        $this->assertEquals($gewicht, $uitslagDetail->gewicht);
    }

    /** @test */
    public function heeftDeelnemers()
    {
        $deelnemers = 'Guido Van Hoof - Verbruggen René';
        $uitslagDetail = bewaarUitslagDetail(['deelnemers' => $deelnemers]);

        $this->assertEquals($deelnemers, $uitslagDetail->deelnemers);
    }

    /** @test */
    public function heeftPlaatsen()
    {
        $plaatsen = '1, 33';
        $uitslagDetail = bewaarUitslagDetail(['plaatsen' => $plaatsen]);

        $this->assertEquals($plaatsen, $uitslagDetail->plaatsen);
    }
}
