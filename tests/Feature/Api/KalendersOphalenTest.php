<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $expectedKalender = bewaarKalender()->toArray();

        $response = $this->get('/api/kalenders');

        $actualKalenders = json_decode($response->content(), true);

        $response->assertStatus(200);
        $this->assertEquals(1, count($actualKalenders));
        $this->assertContains($expectedKalender, $actualKalenders);
        $this->assertEquals($expectedKalender, $actualKalenders[0]);
    }

    /**  @test */
    public function meerdereKalendersAanwezig()
    {
        $firstKalender = bewaarKalender()->toArray();
        $secondKalender = bewaarKalender()->toArray();

        $response = $this->get('/api/kalenders');

        $actualKalenders = json_decode($response->content(), true);

        $response->assertStatus(200);
        $this->assertEquals(2, count($actualKalenders));
        $this->assertContains($firstKalender, $actualKalenders);
        $this->assertContains($secondKalender, $actualKalenders);
        $this->assertEquals($firstKalender, $actualKalenders[0]);
        $this->assertEquals($secondKalender, $actualKalenders[1]);
    }
}
