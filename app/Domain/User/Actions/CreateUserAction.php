<?php


namespace App\Domain\User\Actions;
use App\Domain\User\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;

final class CreateUserAction
{
	public function execute($data = []) : User
	{

      $img_uploading = $data['identity']->store('public/Piece_utilisateur/');
      $user =  User::create([
            	'firstname' => $data['firstname'],
            	'lastname' => $data['lastname'],
            	'email' => $data['email'],
            	'phone' => $data['phone'],
            	'genre' => $data['genre'],
            	'token' => Str::random(60),
            	'birthday' => $data['birthday'],
            	'city_id' => $data['city_id'],
            	'number_is_watsapp' => $data['watsapp'] ? 1 : 0,
            	'moving_means' => $data['moving_means'] ? $data['moving_means'] : null,
            	'identity' => $img_uploading,
            	'matricule' => $data['firstname'].Str::random(4),
                  'password' => Hash::make($data['password']),
            	'role_id' => 2,
            ]); 
     
            return $user;

	}
}	
