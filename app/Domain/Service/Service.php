<?php

namespace App\Domain\Service;

use App\Domain\Checkout\Checkout;
use App\Domain\Service\Domaine;
use App\Domain\User\ProposalProvider;
use App\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    protected $fillable  = ['name','slug','image','domaine_id','price'];


    public function users()
    {
    	return $this->belongsToMany(User::class,'service_users')->withPivot('proposal');
    }

    public function domaine()
    {
    	return $this->belongsTo(Domaine::class);
    }


    public function checkout()
    {
    	return $this->hasMany(Checkout::class);
    }


    public function proposal()
    {
        return $this->hasMany(ProposalProvider::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }




}
