<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WedstrijdResource;
use App\Wedstrijd;
use Illuminate\Http\Request;

class WedstrijdenController extends Controller
{
    public function huidigeMaand()
    {
        return
            WedstrijdResource::collection(
                Wedstrijd::whereRaw("date_format(datum, '%Y%m') = ?", [date('Ym')])->simplePaginate(20)
            );
    }
}
