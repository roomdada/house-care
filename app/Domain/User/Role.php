<?php

namespace App\Domain\User;

use App\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function users()
    {
    	return $this->hasMany(User::class);
    }


    
}
