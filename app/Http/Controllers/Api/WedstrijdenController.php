<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UitslagResource;
use App\Http\Resources\WedstrijdResource;
use App\Wedstrijd;

class WedstrijdenController extends Controller
{
    const AANTAL_RECORDS = 10;

    public function show(Wedstrijd $wedstrijd)
    {
        return new WedstrijdResource(Wedstrijd::find($wedstrijd->id))  ;
    }

    public function huidigeMaand()
    {
        return
            WedstrijdResource::collection(
                Wedstrijd::whereRaw("date_format(datum, '%Y%m') = ?", [date('Ym')])->simplePaginate(self::AANTAL_RECORDS)
            );
    }

    public function uitslag(Wedstrijd $wedstrijd)
    {
        return
            UitslagResource::collection(
                $wedstrijd->uitslag()->OrderBy('volgorde')->simplePaginate(self::AANTAL_RECORDS)
            );
    }
}
