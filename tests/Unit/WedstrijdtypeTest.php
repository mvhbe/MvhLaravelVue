<?php

namespace Tests\Unit;

use App\Kalender;
use Illuminate\Database\QueryException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WedstrijdtypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function heeftEenOmschrijving()
    {
        $omschrijving = 'omschrijving';
        $wedstrijdtype = bewaarWedstrijdtype(['omschrijving' => $omschrijving]);

        $this->assertEquals($omschrijving, $wedstrijdtype->omschrijving);
    }

    /** @test  */
    public function omschrijvingIsUniek()
    {
        $this->expectException(QueryException::class);

        $omschrijving = 'omschrijving';

        bewaarWedstrijdtype(['omschrijving' => $omschrijving]);
        bewaarWedstrijdtype(['omschrijving' => $omschrijving]);
    }

    /** @test  */
    public function heeftEenLink()
    {
        $link = '/wedstrijdtypes/';
        $wedstrijdtype = bewaarWedstrijdtype();

        $this->assertEquals($link . $wedstrijdtype->id, $wedstrijdtype->link());
    }
}
