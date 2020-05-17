<?php

namespace Tests\Feature\Api;

use App\Http\Resources\KalenderResource;
use App\Kalender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Tests\TestCase;

class KalenderOphalenTest extends TestCase
{
    use RefreshDatabase;

    /**  @test */
    public function geenKalendersAanwezig()
    {
        $response = $this->get('/api/kalenders/1900');

        $kalenders = $response->content();

        $response->assertStatus(404);
        $this->assertFalse(empty($kalenders));
    }

    /**  @test */
    public function eenKalenderAanwezig()
    {
        $expectedKalender = bewaarKalender();

        $response = $this->get('/api/kalenders/' . $expectedKalender->jaar);

        $actualKalender = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertKalenderAanwezig($expectedKalender, $actualKalender);
    }

    /**
     * @param $expectedKalender
     * @param $actualKalender
     */
    private function assertKalenderAanwezig($expectedKalender, $actualKalender): void
    {
        $this->assertEquals($expectedKalender->id, $actualKalender["id"]);
        $this->assertEquals($expectedKalender->jaar, $actualKalender["jaar"]);
        $this->assertEquals($expectedKalender->omschrijving(), $actualKalender["omschrijving"]);
    }
}
