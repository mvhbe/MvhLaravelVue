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
    public function heeftEenVolgorde()
    {
        $volgorde = 1;
        $uitslag = bewaarUitslag(['volgorde' => $volgorde]);

        $this->assertEquals($volgorde, $uitslag->volgorde);
    }

    /** @test */
    public function heeftEenGewicht()
    {
        $gewicht = 666;
        $uitslag = bewaarUitslag(['gewicht' => $gewicht]);

        $this->assertEquals($gewicht, $uitslag->gewicht);
    }

    /** @test */
    public function heeftDeelnemers()
    {
        $deelnemers = 'Guido Van Hoof - Verbruggen René';
        $uitslag = bewaarUitslag(['deelnemers' => $deelnemers]);

        $this->assertEquals($deelnemers, $uitslag->deelnemers);
    }

    /** @test */
    public function heeftPlaatsen()
    {
        $plaatsen = '1, 33';
        $uitslag = bewaarUitslag(['plaatsen' => $plaatsen]);

        $this->assertEquals($plaatsen, $uitslag->plaatsen);
    }
}
