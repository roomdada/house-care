<?php

namespace App\Domain\User\Actions;
use App\Domain\User\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;

final class CreateCustomerAction
{
	public function execute($data = []) : User
	{

      $user =  User::create([
            	'firstname' => $data['firstname'],
            	'lastname' => $data['lastname'],
            	'email' => $data['email'],
                  'phone' => $data['phone'],
                  'validation' => 1,
            	'admin_validation' => 1,
            	'token' => Str::random(60),
            	'number_is_watsapp' => $data['watsapp'] ? 1 : 0,
            	'matricule' => $data['firstname'].Str::random(4),
                  'password' => Hash::make($data['password']),
            	'role_id' => 4,
            ]); 
     
      return $user;

	}
}	
