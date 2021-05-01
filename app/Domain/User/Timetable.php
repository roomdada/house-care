<?php

namespace App\Domain\User;

use App\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable  = ['user_id','day'];

     public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
