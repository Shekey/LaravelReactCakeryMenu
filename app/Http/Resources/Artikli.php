<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Artikli extends JsonResource
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
            'id' => $this->id,
            'naziv' => $this->naziv,
            'opis' => $this->opis,
            'podkategorija' => $this->podkategorija->naziv,
            'kategorija' => $this->podkategorija->kategorija->naziv,
            'slikaUrl' => $this->podkategorija->slikaUrl,
        ];
    }
}
