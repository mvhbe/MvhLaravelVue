<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KalenderResource extends JsonResource
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
            'jaar' => $this->jaar,
            'omschrijving' => $this->omschrijving(),
            'aantal_wedstrijden' => $this->wedstrijden->count()
        ];
    }
}
