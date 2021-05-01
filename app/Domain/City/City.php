<?php

namespace App\Domain\City;

use App\Domain\House\House;
use App\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['city', 'slug'];


    public function houses()
    {
    	return $this->hasMany(House::class);
    }

    public function users()
    {
    	return $this->hasMany(User::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
