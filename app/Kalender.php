<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kalender extends Model
{
    const PREFIX = 'Kalender ';
    const URL_PREFIX = '/kalenders/';

    protected $fillable = ['jaar', 'opmerkingen'];

    public function omschrijving() {
        return self::PREFIX . $this->jaar;
    }

    public function link() {
        return self::URL_PREFIX . $this->jaar;
    }

    public function getRouteKeyName()
    {
        return 'jaar';
    }

    public function wedstrijden()
    {
        return $this->hasMany(Wedstrijd::class, 'kalender_id', 'id');
    }
}
