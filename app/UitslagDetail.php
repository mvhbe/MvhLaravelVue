<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UitslagDetail extends Model
{
    protected $table = "uitslagdetails";
    protected $fillable = [
        'uitslag_id', 'volgorde', 'gewicht', 'deelnemers', 'plaatsen'
    ];

    public function uitslag()
    {
        return $this->belongsTo(Uitslag::class);
    }
}
