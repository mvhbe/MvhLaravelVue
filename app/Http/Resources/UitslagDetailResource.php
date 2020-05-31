<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UitslagDetailResource extends JsonResource
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
            "volgorde" => $this->volgorde,
            "gewicht" => number_format($this->gewicht, 0, ',', '.'),
            "deelnemers" => $this->deelnemers,
            "plaatsen" => $this->plaatsen
        ];
    }
}
