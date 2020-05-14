<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wedstrijdtype extends Model
{
    const LINK_PREFIX = '/wedstrijdtypes/';

    protected $fillable = ['omschrijving'];

    public function link()
    {
        return self::LINK_PREFIX . $this->id;
    }
}
