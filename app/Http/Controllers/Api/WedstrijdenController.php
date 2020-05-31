<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UitslagResource;
use App\Http\Resources\WedstrijdResource;
use App\Wedstrijd;

class WedstrijdenController extends Controller
{
    public function show(Wedstrijd $wedstrijd)
    {
        return new WedstrijdResource(Wedstrijd::find($wedstrijd->id))  ;
    }

    public function huidigeMaand()
    {
        return
            WedstrijdResource::collection(
                Wedstrijd::whereRaw("date_format(datum, '%Y%m') = ?", [date('Ym')])->get()
            );
    }

    public function uitslag(Wedstrijd $wedstrijd)
    {
        return
            UitslagResource::collection(
                $wedstrijd->uitslag
            );
    }
}
