<?php

namespace Tests\Unit;

use App\Wedstrijd;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WedstrijdTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function heeftEenDatum()
    {
        $datum = date('Y-m-d');
        $wedstrijd = bewaarWedstrijd(['datum' => $datum]);

        $this->assertEquals($datum, $wedstrijd->datum);
    }

    /** @test  */
    public function datumIsUniek()
    {
        $this->expectException(QueryException::class);

        $datum = date('Y-m-d');

        bewaarWedstrijd(['datum' => $datum]);
        bewaarWedstrijd(['datum' => $datum]);
    }

    /** @test  */
    public function heeftEenOmschrijving()
    {
        $omschrijving = 'wedstrijdomschrijving';
        $wedstrijd = bewaarWedstrijd(['omschrijving' => $omschrijving]);

        $this->assertEquals($omschrijving, $wedstrijd->omschrijving);
    }

    /** @test  */
    public function heeftOpmerkingen()
    {
        $opmerkingen = 'OPMERKINGEN';
        $wedstrijd = bewaarWedstrijd(['opmerkingen' => $opmerkingen]);

        $this->assertEquals($opmerkingen, $wedstrijd->opmerkingen);
    }

    /** @test  */
    public function opmerkingenIsOptioneel()
    {
        $wedstrijd = bewaarWedstrijd(['opmerkingen' => null]);

        $this->assertEquals(null, $wedstrijd->opmerkingen);
    }

    /** @test  */
    public function heeftEenSponsor()
    {
        $sponsor = 'SPONSOR';
        $wedstrijd = bewaarWedstrijd(['sponsor' => $sponsor]);

        $this->assertEquals($sponsor, $wedstrijd->sponsor);
    }

    /** @test  */
    public function sponsorIsOptioneel()
    {
        $wedstrijd = bewaarWedstrijd(['sponsor' => null]);

        $this->assertEquals(null, $wedstrijd->sponsor);
    }

    /** @test  */
    public function heeftEenKalenderId()
    {
        $kalender = bewaarKalender();
        $wedstrijd = bewaarWedstrijd(['kalender_id' => $kalender->id]);

        $this->assertEquals($kalender->id, $wedstrijd->kalender_id);
    }

    /** @test  */
    public function heeftEenKalender()
    {
        $kalender = bewaarKalender();
        $wedstrijd = bewaarWedstrijd(['kalender_id' => $kalender->id]);

        $this->assertEquals($kalender->fresh(), $wedstrijd->kalender);
    }

    /** @test  */
    public function heeftEenAanvang()
    {
        $aanvang = date('H:i:s');
        $wedstrijd = bewaarWedstrijd(['aanvang' => $aanvang]);

        $this->assertEquals($aanvang, $wedstrijd->fresh()->aanvang);
    }

    /** @test  */
    public function heeftEenLink()
    {
        $datum = date('Y-m-d');
        $wedstrijd = maakWedstrijd(['datum' => $datum]);
        $link = '/wedstrijden/' . $wedstrijd->id;

        $this->assertEquals($link, $wedstrijd->link());
    }

    /** @test  */
    public function heeftEenWedstrijtypeId()
    {
        $wedstrijdtype = bewaarWedstrijdtype();
        $wedstrijd = bewaarWedstrijd(['wedstrijdtype_id' => $wedstrijdtype->id]);

        $this->assertEquals($wedstrijdtype->id, $wedstrijd->wedstrijdtype_id);
    }

    /** @test */
    public function heeftEenNummer()
    {
        $nummer = 1;
        $wedstrijd = bewaarWedstrijd(['nummer' => $nummer]);

        $this->assertEquals($nummer, $wedstrijd->nummer);
    }

    /** @test */
    public function nummerIsOptioneel()
    {
        $nummer = null;
        $wedstrijd = bewaarWedstrijd(['nummer' => $nummer]);

        $this->assertEquals($nummer, $wedstrijd->nummer);
    }

    /** @test  */
    public function heeftEenForeignKeyNaarKalender()
    {
        $this->expectException(QueryException::class);

        $kalender = bewaarKalender();
        bewaarWedstrijd(['kalender_id' => $kalender->id]);

        $kalender->delete();
    }

    /** @test  */
    public function heeftEenForeignKeyNaarWedstrijdtype()
    {
        $this->expectException(QueryException::class);

        $wedstrijdtype = bewaarWedstrijdtype();
        bewaarWedstrijd(['wedstrijdtype_id' => $wedstrijdtype->id]);

        $wedstrijdtype->delete();
    }

    /** @test */
    public function heeftEenUitslag()
    {
        $wedstrijd = bewaarWedstrijd();
        $expectedUitslag = bewaarUitslag(['wedstrijd_id' => $wedstrijd->id]);

        $actualUitslag = $wedstrijd->uitslag->toArray();

        $this->assertEquals(1, count($actualUitslag));
        $this->assertEquals($expectedUitslag->toArray(), $actualUitslag[0]);
    }

    /** @test */
    public function uitslagIsGesorteerdOpVolgorde()
    {
        $wedstrijd = bewaarWedstrijd();
        $tweedeUitslag =  bewaarUitslag(['wedstrijd_id' => $wedstrijd->id, 'volgorde' => 2]);
        $eersteUitslag =  bewaarUitslag(['wedstrijd_id' => $wedstrijd->id, 'volgorde' => 1]);

        $actualUitslag = $wedstrijd->uitslag->toArray();

        $this->assertEquals(2, count($actualUitslag));
        $this->assertEquals($eersteUitslag->toArray()["volgorde"], $actualUitslag[0]["volgorde"]);
        $this->assertEquals($tweedeUitslag->toArray()["volgorde"], $actualUitslag[1]["volgorde"]);
    }

    /** @test  */
    public function heeftDatumAlsRouteKeyName()
    {
        $wedstrijd = maakWedstrijd();

        $this->assertEquals('datum', $wedstrijd->getRouteKeyName());
    }
}
