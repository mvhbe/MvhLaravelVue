<?php

namespace Tests\Feature\Api;

use App\Http\Resources\KalenderResource;
use App\Kalender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Tests\TestCase;

class WedstrijdUitslagOphalenTest extends TestCase
{
    use RefreshDatabase;

    /**  @test */
    public function geenUitslagAanwezig()
    {
        $response = $this->get('/api/wedstrijden/2929-01-03/uitslag');

        $uitslag = $response->content();

        $response->assertStatus(404);
        $this->assertFalse(empty($uitslag));
    }

    /**  @test */
    public function eenUitslagAanwezig()
    {
        $expectedUitslag = bewaarUitslag();

        $response = $this->get('/api/wedstrijden/' . $expectedUitslag->wedstrijd->datum . "/uitslag");

        $actualUitslag = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertEquals(1, count($actualUitslag));
        $this->assertUitslagAanwezig($expectedUitslag->toArray(), $actualUitslag[0]);
    }

    /**  @test */
    public function meerdereUitslagenAanwezig()
    {
        $wedstrijd = bewaarWedstrijd();
        bewaarUitslag(['wedstrijd_id' => $wedstrijd->id]);
        bewaarUitslag(['wedstrijd_id' => $wedstrijd->id]);
        $expectedUitslag = $wedstrijd->uitslag->toArray();

        $response = $this->get('/api/wedstrijden/' . $wedstrijd->datum . "/uitslag");

        $actualUitslag = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertEquals(2, count($actualUitslag));
        $this->assertUitslagAanwezig($expectedUitslag[0], $actualUitslag[0]);
        $this->assertUitslagAanwezig($expectedUitslag[1], $actualUitslag[1]);
    }

    /**
     * @param $expectedUitslag
     * @param $actualUitslag
     */
    private function assertUitslagAanwezig($expectedUitslag, $actualUitslag): void
    {
        $this->assertEquals($expectedUitslag["volgorde"], $actualUitslag["volgorde"]);
        $this->assertEquals(
            number_format($expectedUitslag["gewicht"], '0', ',', '.'),
            $actualUitslag["str_gewicht"]
        );
        $this->assertEquals($expectedUitslag["gewicht"], $actualUitslag["gewicht"]);
        $this->assertEquals($expectedUitslag["deelnemers"], $actualUitslag["deelnemers"]);
        $this->assertEquals($expectedUitslag["plaatsen"], $actualUitslag["plaatsen"]);
    }
}
