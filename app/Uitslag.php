<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uitslag extends Model
{
    protected $table = "uitslagen";
    protected $fillable = [
        'wedstrijd_id', 'volgorde', 'gewicht', 'deelnemers', 'plaatsen'
    ];

    public function wedstrijd()
    {
        return $this->belongsTo(Wedstrijd::class);
    }
}
