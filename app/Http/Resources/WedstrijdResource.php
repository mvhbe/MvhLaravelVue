<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WedstrijdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'datum' => $this->datum,
            'omschrijving' => $this->omschrijving,
            'aanvang' => $this->aanvang,
            'uitslag_beschikbaar' => ($this->uitslag->count() > 0)
        ];
    }
}
