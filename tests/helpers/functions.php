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
