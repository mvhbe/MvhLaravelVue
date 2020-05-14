<?php

namespace Tests\Feature\Api;

use App\Http\Resources\KalenderResource;
use App\Kalender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;
use Tests\TestCase;

class KalendersOphalenTest extends TestCase
{
    use RefreshDatabase;

    /**  @test */
    public function geenKalendersAanwezig()
    {
        $response = $this->get('/api/kalenders');

        $kalenders = $response->content();

        $response->assertStatus(200);
        $this->assertFalse(empty($kalenders));
    }

    /**  @test */
    public function eenKalenderAanwezig()
    {
        $expectedKalender = bewaarKalender();

        $response = $this->get('/api/kalenders');

        $actualKalenders = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertEquals(1, count($actualKalenders));
        $this->assertKalenderAanwezig($expectedKalender, $actualKalenders[0]);
    }

    /**  @test */
    public function meerdereKalendersAanwezig()
    {
        $firstKalender = bewaarKalender();
        $secondKalender = bewaarKalender();

        $response = $this->get('/api/kalenders');

        $actualKalenders = json_decode($response->content(), true)["data"];

        $response->assertStatus(200);
        $this->assertEquals(2, count($actualKalenders));
        $this->assertKalenderAanwezig($firstKalender, $actualKalenders[0]);
        $this->assertKalenderAanwezig($secondKalender, $actualKalenders[1]);
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
