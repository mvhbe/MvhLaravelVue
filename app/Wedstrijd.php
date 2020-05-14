<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Wedstrijd extends Model
{
    const PATH_WEDSTRIJDEN = '/wedstrijden/';

    protected $table = "wedstrijden";
    protected $dates = ['datum'];
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

    public function getDatumAttribute($datum)
    {
        return Carbon::parse($datum)->format('d/m/Y');
    }

    public function setDatumAttribute($datum)
    {
        $this->attributes['datum'] = Carbon::createFromFormat('d/m/Y', $datum)->format('Y-m-d');
    }

    public function getAanvangAttribute($aanvang)
    {
        return Carbon::parse($aanvang)->format('H:i');
    }
}
