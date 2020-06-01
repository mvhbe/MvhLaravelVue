<?php

namespace Tests\Feature\Api;

use App\Http\Resources\KalenderResource;
use App\Kalender;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Tests\TestCase;

class KalenderWedstrijdenOphalenTest extends TestCase
{
    use RefreshDatabase;

    /**  @test */
    public function geenKalenderWedstrijdenAanwezig()
    {
        $kalender = bewaarKalender();

        $response = $this->get('/api/kalenders/' . $kalender->jaar . '/wedstrijden');

        $actualWedstrijden = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertTrue(empty($actualWedstrijden));
    }

    /**  @test */
    public function eenKalenderWedstrijdAanwezig()
    {
        $expectedWedstrijd = bewaarWedstrijd();

        $response = $this->get('/api/kalenders/'. $expectedWedstrijd->kalender->jaar . '/wedstrijden');

        $actualWedstrijden = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertEquals(1, count($actualWedstrijden));
        $this->assertWedstrijdAanwezig($expectedWedstrijd, $actualWedstrijden[0]);
    }

    /**  @test
     */
    public function wedstrijdenGesorteerdOpDatum()
    {
        $kalender = bewaarKalender();
        $eersteWedstrijd = bewaarWedstrijd(
            ["kalender_id" => $kalender->id, "datum" => Carbon::now()->addDay()->format('Y-m-d')]
        );
        $tweedeWedstrijd = bewaarWedstrijd(
            ["kalender_id" => $kalender->id, "datum" => Carbon::now()->format('Y-m-d')]
        );

        $response = $this->get('/api/kalenders/' . $kalender->jaar . '/wedstrijden');

        $actualWedstrijden = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertEquals(2, count($actualWedstrijden));
        $this->assertWedstrijdAanwezig($tweedeWedstrijd, $actualWedstrijden[0]);
        $this->assertWedstrijdAanwezig($eersteWedstrijd, $actualWedstrijden[1]);
    }

    /**
     * @param $expectedWedsrrijd
     * @param $actualWedstrijd
     */
    private function assertWedstrijdAanwezig($expectedWedsrrijd, $actualWedstrijd): void
    {
        $this->assertEquals($expectedWedsrrijd->datum, $actualWedstrijd["datum"]);
        $this->assertEquals($expectedWedsrrijd->omschrijving, $actualWedstrijd["omschrijving"]);
        $this->assertEquals($expectedWedsrrijd->aanvang, $actualWedstrijd["aanvang"]);
        $this->assertEquals($expectedWedsrrijd->uitslag_beschikbaar, $actualWedstrijd["uitslag_beschikbaar"]);
    }
}
