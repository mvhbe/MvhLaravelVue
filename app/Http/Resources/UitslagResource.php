<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UitslagResource extends JsonResource
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
            "totaal_gewicht" => number_format($this->totaal_gewicht, 0, ',', '.'),
            "aantal_deelnemers" => $this->aantal_deelnemers,
            "gemiddeld_gewicht" => number_format($this->gemiddeld_gewicht, 0, ',', '.'),
            "details" => UitslagDetailResource::collection($this->details()->get())
        ];
    }
}
