<?php

namespace App\Domain\Checkout;

use App\Domain\House\House;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseCkeckout extends Model
{
    use HasFactory;


    protected $fillable = ['firstname','lastname','email','phone','house_id'];

    public function house()
    {
    	return $this->belongsTo(House::class);
    }
}
