<?php

namespace Tests\Feature\Api;

use App\Http\Resources\KalenderResource;
use App\Kalender;
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
        $this->assertKalenderAanwezig($expectedWedstrijd, $actualWedstrijden[0]);
    }

    /**  @test
     */
    public function meerdereKalenderWedstrijdenAanwezig()
    {
        $kalender = bewaarKalender();
        $eersteWedstrijd = bewaarWedstrijd(["kalender_id" => $kalender->id]);
        $tweedeWedstrijd = bewaarWedstrijd(["kalender_id" => $kalender->id]);

        $response = $this->get('/api/kalenders/' . $kalender->jaar . '/wedstrijden');

        $actualWedstrijden = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertEquals(2, count($actualWedstrijden));
        $this->assertKalenderAanwezig($eersteWedstrijd, $actualWedstrijden[0]);
        $this->assertKalenderAanwezig($tweedeWedstrijd, $actualWedstrijden[1]);
    }

    /**
     * @param $expectedWedsrrijd
     * @param $actualWedstrijd
     */
    private function assertKalenderAanwezig($expectedWedsrrijd, $actualWedstrijd): void
    {
        $this->assertEquals($expectedWedsrrijd->id, $actualWedstrijd["id"]);
        $this->assertEquals($expectedWedsrrijd->datum, $actualWedstrijd["datum"]);
        $this->assertEquals($expectedWedsrrijd->omschrijving, $actualWedstrijd["omschrijving"]);
        $this->assertEquals($expectedWedsrrijd->aanvang, $actualWedstrijd["aanvang"]);
    }
}
