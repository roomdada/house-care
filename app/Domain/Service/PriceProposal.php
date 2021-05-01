<?php

namespace App\Domain\Service;

use App\Domain\Service\Service;
use App\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceProposal extends Model
{

    use HasFactory;
	protected $fillable = ['service_id','user_id','price_proposal'];


	public function service()
	{
		return $this->belongsTo(Service::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
