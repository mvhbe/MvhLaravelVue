<?php

namespace Tests\Feature\Api;

use App\Http\Resources\KalenderResource;
use App\Kalender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Tests\TestCase;

class WedstrijdOphalenTest extends TestCase
{
    use RefreshDatabase;

    /**  @test */
    public function geenWedstrijdAanwezig()
    {
        $response = $this->get('/api/wedstrijden/2929-01-03');

        $wedstrijd = $response->content();

        $response->assertStatus(404);
        $this->assertFalse(empty($wedstrijd));
    }

    /**  @test */
    public function eenWedstrijdAanwezig()
    {
        $expectedWedstrijd = bewaarWedstrijd();

        $response = $this->get('/api/wedstrijden/' . $expectedWedstrijd->datum);

        $actualWedstrijd = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertWedstrijdAanwezig($expectedWedstrijd, $actualWedstrijd);
    }

    private function assertWedstrijdAanwezig($expectedWedstrijd, $actualWedstrijd): void
    {
        $this->assertEquals($expectedWedstrijd->datum, $actualWedstrijd["datum"]);
        $this->assertEquals($expectedWedstrijd->omschrijving, $actualWedstrijd["omschrijving"]);
        $this->assertEquals($expectedWedstrijd->aanvang, $actualWedstrijd["aanvang"]);
        $this->assertEquals($expectedWedstrijd->uitslag_beschikbaar, $actualWedstrijd["uitslag_beschikbaar"]);
    }
}
