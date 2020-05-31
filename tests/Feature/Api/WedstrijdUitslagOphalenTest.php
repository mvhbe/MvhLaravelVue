<?php

namespace Tests\Feature\Api;

use App\Http\Resources\KalenderResource;
use App\Http\Resources\UitslagDetailResource;
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
    public function uitslagMetDetailAanwezig()
    {
        $expectedUitslag = bewaarUitslag();
        bewaarUitslagDetail(["uitslag_id" => $expectedUitslag->id]);

        $response = $this->get('/api/wedstrijden/' . $expectedUitslag->wedstrijd->datum . "/uitslag");

        $actualUitslag = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertUitslagAanwezig($expectedUitslag->toArray(), $actualUitslag[0]);
        $this->assertUitslagDetailAanwezig(
            UitslagDetailResource::collection($expectedUitslag->details)->resolve(), $actualUitslag[0]["details"]
        );
    }

    /**  @test */
    public function uitslagZonderDetailAanwezig()
    {
        $expectedUitslag = bewaarUitslag();

        $response = $this->get('/api/wedstrijden/' . $expectedUitslag->wedstrijd->datum . "/uitslag");

        $actualUitslag = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertUitslagAanwezig($expectedUitslag->toArray(), $actualUitslag[0]);
        $this->assertUitslagDetailAanwezig(
            UitslagDetailResource::collection($expectedUitslag->details)->resolve(), $actualUitslag[0]["details"]
        );
    }

    /**
     * @param $expectedUitslag
     * @param $actualUitslag
     */
    private function assertUitslagAanwezig($expectedUitslag, $actualUitslag): void
    {
        $this->assertEquals(
            formatteerGewicht($expectedUitslag["totaal_gewicht"]), $actualUitslag["totaal_gewicht"]
        );
        $this->assertEquals($expectedUitslag["aantal_deelnemers"], $actualUitslag["aantal_deelnemers"]);
        $this->assertEquals(
            formatteerGewicht($expectedUitslag["gemiddeld_gewicht"]), $actualUitslag["gemiddeld_gewicht"]
        );
    }

    /**
     * @param $expectedDetailUitslag
     * @param $actualUitslagDetail
     */
    private function assertUitslagDetailAanwezig($expectedDetailUitslag, $actualUitslagDetail): void
    {
        $this->assertEquals($expectedDetailUitslag, $actualUitslagDetail);
    }
}
