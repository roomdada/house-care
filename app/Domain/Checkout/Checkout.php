<?php

namespace App\Domain\Checkout;

use App\Domain\Service\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{

    use HasFactory;
	protected $fillable = ['firstname','lastname','email','phone','city','user_id','service_id','comment'];



	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
