<?php

namespace App\Domain\User;

use App\Domain\Checkout\Checkout;
use App\Domain\City\City;
use App\Domain\House\House;
use App\Domain\Service\Service;
use App\Domain\User\Role;
use App\Domain\User\Testimony;
use App\Domain\User\Timetable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'disponible',
        'inline',
        'number_is_watsapp',
        'validation',
        'phone',
        'phone_2',
        'phone_3',
        'genre',
        'compagny',
        'birthday',
        'identity',
        'moving_means',
        'admin_validation',
        'role_id',
        'city_id',
        'token',
        'matricule',
        'materials',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'service_users')->withPivot('proposal');
    }

    public function timetable()
    {
        return $this->hasMany(Timetable::class);
    }

    public function houses()
    {
        return $this->hasMany(House::class);
    }


    public function testimony()
    {
        return $this->hasMany(Testimony::class);
    }


    public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function getRouteKeyName()
    {
        return 'token';
    }
}
