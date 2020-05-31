<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uitslag extends Model
{
    protected $table = 'uitslagen';
    protected $fillable = [
        'wedstrijd_id', 'totaal_gewicht', 'aantal_deelnemers', 'gemiddeld_gewicht'
    ];

    public function wedstrijd()
    {
        return $this->belongsTo(Wedstrijd::class);
    }

    public function details()
    {
        return $this->hasMany(UitslagDetail::class, 'uitslag_id', 'id')->orderBy('volgorde');
    }
}
