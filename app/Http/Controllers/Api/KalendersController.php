<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KalenderResource;
use App\Http\Resources\WedstrijdResource;
use App\Kalender;
use App\Wedstrijd;
use Illuminate\Http\Request;
use Prophecy\Argument\Token\AnyValuesToken;

class KalendersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return KalenderResource::collection(Kalender::orderBy('jaar', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kalender $kalender)
    {
        return new KalenderResource(Kalender::find($kalender->id))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Kalender $kalender
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function wedstrijden(Kalender $kalender)
    {
        return
            WedstrijdResource::collection(
                Wedstrijd::where('kalender_id', '=', $kalender->id)
                    ->OrderBy("datum")
                    ->get()
            );
    }
}
