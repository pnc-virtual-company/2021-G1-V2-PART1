<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        return [
            "title" => $this -> title,
            "city" => $this -> city,
            "startdate" => $this -> startdate,
            "enddate" => $this -> enddate,
            "description" => $this -> description,
            "photo" => $this -> photo,
            // "created_at" => $this -> created_at->format('l F Y | h:i:s A'),
            "updated_at" => $this -> updated_at->format('d-m-Y'),
            // "updated_at" => $this -> updated_at->format('j,l F Y | H:i:s A'),
        ];
    }
}
