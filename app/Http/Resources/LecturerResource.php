<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LecturerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'identity' => $this->identity,
            'full_name' => $this->full_name,
            'title_first' => $this->title_first,
            'title_end' => $this->title_end,
            'id_major' => $this->id_major,
            'phone' => $this->phone,
            'address' => $this->address,
            'place_birth' => $this->place_birth,
            'date_birth' => $this->date_birth,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
