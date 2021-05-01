<?php

namespace App\Domain\Service;

use App\Domain\Service\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;


    protected $fillable = ['name','icone','slug'];


    public function services()
    {
    	return $this->hasMany(Service::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
