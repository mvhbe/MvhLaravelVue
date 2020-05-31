<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Wedstrijd extends Model
{
    const PATH_WEDSTRIJDEN = '/wedstrijden/';

    protected $table = "wedstrijden";
    protected $fillable = [
        'kalender_id', 'datum', 'omschrijving', 'sponsor', 'aanvang', 'wedstrijdtype_id', 'opmerkingen', 'nummer'
    ];

    public function link()
    {
        return self::PATH_WEDSTRIJDEN . $this->id;
    }

    public function kalender()
    {
        return $this->belongsTo(Kalender::class);
    }

    public function uitslag()
    {
        return $this->hasMany(Uitslag::class);
    }

    public function getRouteKeyName()
    {
        return 'datum';
    }
}
