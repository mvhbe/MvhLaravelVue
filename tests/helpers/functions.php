<?php

use App\Kalender;
use App\Reeks;
use App\Wedstrijd;
use App\Wedstrijdtype;

function bewaarKalender($velden = [])
{
    return factory(Kalender::class)->create($velden);
}

function maakKalender($velden = [])
{
    return factory(Kalender::class)->make($velden);
}

function bewaarWedstrijdtype($velden = [])
{
    return factory(Wedstrijdtype::class)->create($velden);
}

function maakWedstrijdtype($velden = [])
{
    return factory(Wedstrijdtype::class)->make($velden);
}

function bewaarWedstrijd($velden = [])
{
    return factory(Wedstrijd::class)->create($velden);
}

function maakWedstrijd($velden = [])
{
    return factory(Wedstrijd::class)->make($velden);
}
