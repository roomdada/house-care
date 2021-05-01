<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
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
         'city'=>$this->city,
         'token'=>$this->token,
         'price'=>$this->price,
         'place'=>$this->place,
         'description'=>$this->description,
         'image_1'=> env('APP_URL')."/$this->image_1",
         'image_2'=> env('APP_URL')."/$this->image_2",
         'image_3'=> env('APP_URL')."/$this->image_3",
         'image_4'=> env('APP_URL')."/$this->image_4",
     ];
    }
}
