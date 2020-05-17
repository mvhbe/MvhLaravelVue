<?php

namespace Tests\Unit;

use App\Kalender;
use Illuminate\Database\QueryException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KalenderTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function heeftEenJaar()
    {
        $jaar = date('Y');
        $kalender = bewaarKalender(['jaar' => $jaar]);

        $this->assertEquals($jaar, $kalender->jaar);
    }

    /** @test  */
    public function heeftOpmerkingen()
    {
        $opmerkingen = 'OPMERKINGEN';
        $kalender = bewaarKalender(['opmerkingen' => $opmerkingen]);

        $this->assertEquals($opmerkingen, $kalender->opmerkingen);
    }

    /** @test  */
    public function heeftEenOmschrijving()
    {
        $jaar = date('Y');
        $omschrijving = 'Kalender ';
        $kalender = maakKalender(['jaar' => $jaar]);

        $this->assertEquals($omschrijving . $jaar, $kalender->omschrijving());
    }

    /** @test  */
    public function heeftEenLink()
    {
        $jaar = date('Y');
        $link = '/kalenders/';
        $kalender = maakKalender(['jaar' => $jaar]);

        $this->assertEquals($link . $jaar, $kalender->link());
    }

    /** @test  */
    public function heeftJaarAlsRouteKeyName()
    {
        $kalender = maakKalender();

        $this->assertEquals('jaar', $kalender->getRouteKeyName());
    }

    /** @test  */
    public function opmerkingenIsOptioneel()
    {
        $kalender = bewaarKalender(['opmerkingen' => null]);

        $this->assertEquals(null, $kalender->opmerkingen);
    }

    /** @test  */
    public function jaarIsUniek()
    {
        $this->expectException(QueryException::class);

        $jaar = date('Y');

        bewaarKalender(['jaar' => $jaar]);
        bewaarKalender(['jaar' => $jaar]);
    }

    /** @test  */
    public function heeftWedstrijden()
    {
        $kalender = bewaarKalender();
        $eersteWedstrijd = bewaarWedstrijd(['kalender_id' => $kalender->id]);
        $tweedeWedstrijd = bewaarWedstrijd(['kalender_id' => $kalender->id]);

        $kalenderWedstrijden = $kalender->wedstrijden->toArray();

        $this->assertEquals(2, count($kalenderWedstrijden));
        $this->assertContains($eersteWedstrijd->toArray(), $kalenderWedstrijden);
        $this->assertContains($tweedeWedstrijd->toArray(), $kalenderWedstrijden);
    }
}
