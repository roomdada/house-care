<?php

namespace App\Domain\User;

use App\Domain\Service\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalProvider extends Model
{


    use HasFactory;


    protected $fillable = ['firstname','lastname','phone','service_id'];


    public function service()
    {
    	return $this->belongsTo(Service::class);
    }
}
