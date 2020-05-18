<?php

namespace Tests\Feature\Api;

use App\Http\Resources\KalenderResource;
use App\Kalender;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Tests\TestCase;

class WedstrijdenHuigeMaandOphalenTest extends TestCase
{
    use RefreshDatabase;

    const URL_HUIDIGEMAAND = '/api/wedstrijden/huidigemaand';

    /**  @test */
    public function geenWedstrijdenHuidigeMaandAanwezig()
    {
        $response = $this->get(self::URL_HUIDIGEMAAND);

        $wedstrijden = $response->content();

        $response->assertStatus(200);
        $this->assertFalse(empty($wedstrijden));
    }

    /**  @test */
    public function wedstrijdenHuidigeMaandAanwezig()
    {
        bewaarWedstrijd(['datum' => Carbon::now()->subMonth()->format('Y-m-d')]);
        $wedstrijdHuidigeMaand = bewaarWedstrijd(['datum' => Carbon::now()->format('Y-m-d')]);
        bewaarWedstrijd(['datum' => Carbon::now()->addMonth()->format('Y-m-d')]);

        $response = $this->get(self::URL_HUIDIGEMAAND);

        $actualWedstrijden = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertEquals(1, count($actualWedstrijden));
        $this->assertWedstrijdAanwezig($wedstrijdHuidigeMaand, $actualWedstrijden[0]);
    }

    /**
     * @param $expectedWedsrrijd
     * @param $actualWedstrijd
     */
    private function assertWedstrijdAanwezig($expectedWedsrrijd, $actualWedstrijd): void
    {
        $this->assertEquals($expectedWedsrrijd->id, $actualWedstrijd["id"]);
        $this->assertEquals($expectedWedsrrijd->datum, $actualWedstrijd["datum"]);
        $this->assertEquals($expectedWedsrrijd->omschrijving, $actualWedstrijd["omschrijving"]);
        $this->assertEquals($expectedWedsrrijd->aanvang, $actualWedstrijd["aanvang"]);
    }
}
