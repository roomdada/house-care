<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DomaineResource extends JsonResource
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
         'name'=>$this->name,
         'slug'=>$this->slug,
         'color'=>$this->color,
         'icone'=> env('APP_URL')."/storage/app/$this->icone"
     ];
    }
}
