<?php

namespace App\Http\Resources\Anggota;

use Illuminate\Http\Resources\Json\JsonResource;

class AnggotaResource extends JsonResource
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
            'nama' => $this->nama,
            'slug' => $this->slug,
            'gender' => $this->gender,
            'tanggal_lahir' => $this->tanggal_lahir,
            'nik' => $this->nik,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'kelurahan' => $this->kelurahan,
            'kecamatan' => $this->kecamatan,
            'kabupaten_kota' => $this->kabupaten_kota,
            'korwil' => $this->korwil,
            'tps' => $this->tps,
            'ktp_image' => $this->ktp_image,
            'question_1' => $this->question_1,
            'question_2' => $this->question_2,
            'question_3' => $this->question_3,
            'question_4' => $this->question_4,
            'question_5' => $this->question_5,
            
            'user_id' => $this->user_id,


            'created_at' => (string)$this->created_at,
        ];
    }
}
