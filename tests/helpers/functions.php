<?php

use App\Kalender;
use App\Uitslag;
use App\UitslagDetail;
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

function bewaarUitslag($velden = [])
{
    return factory(Uitslag::class)->create($velden);
}

function maakUitslag($velden = [])
{
    return factory(Uitslag::class)->make($velden);
}

function bewaarUitslagDetail($velden = [])
{
    return factory(UitslagDetail::class)->create($velden);
}

function maakUitslagDetail($velden = [])
{
    return factory(UitslagDetail::class)->make($velden);
}

function formatteerGewicht($gewicht)
{
    return number_format($gewicht, 0, ',', '.');
}
