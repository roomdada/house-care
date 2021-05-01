<?php

namespace App\Domain\House;

use App\Domain\Checkout\HouseCkeckout;
use App\Domain\City\City;
use App\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;



    protected $fillable = ['city_id','place','price','user_id','image_1','image_2','image_3','image_4','token'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }


    public function checkout()
    {
    	return $this->hasMany(HouseCkeckout::class);
    }


    public function getRouteKeyName()
    {
        return 'token';
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
