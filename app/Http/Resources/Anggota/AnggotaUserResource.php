<?php

namespace App\Http\Resources\Anggota;

use Illuminate\Http\Resources\Json\JsonResource;

class AnggotaUserResource extends JsonResource
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
            'name' => $this->name
        ];
    }
}
