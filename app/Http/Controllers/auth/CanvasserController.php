<?php

namespace App\Http\Controllers\auth;

use App\Domain\User\Actions\CreateCanvasserAction;
use App\Http\Controllers\Controller;
use App\Mail\ProviderHasCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CanvasserController extends Controller
{
    public function RegisterCanvasser(Request $provider,CreateCanvasserAction $createCanvasserAction){

    	$inputs = $provider->all();

    	$data = $rules = [
    		'firstname' => 'required|string',
    		'lastname' => 'required|string',
    		'phone' => 'required|string',
    		'email' => 'required|string|email|unique:users',
    		'genre' => 'required|string',
    		'validation' => 'accepted',
    		'birthday' => 'required',
    		'phone' => 'required|string',
    		'password' => 'required|string|confirmed',
    		'city_id' => 'required',
    		'identity' => 'required|file',
    		'password_confirmation' => 'required|string',
    	];

    	$messages = [
    		'required' => 'Veuillez remplit ce champ',
    		'unique' => 'Cet email est déja utilisé',
    		'accepted' => 'Veuillez accepter les termes et conditions',
    		'email' => 'Veuillez entrer un email valide',
    		'file' => 'Veuillez entrer un fichier',
    		'string' => 'Ce champ doit ettre une chaine de caractere',
    		'string' => 'Ce champ doit ettre une chaine de caractere',
    	];

    	Validator::make($inputs, $rules, $messages)->validate();
        $data = $provider->all();

        $data['watsapp']  = $provider->watsapp;
        $data['moving_means']  = $provider->moving_means;
    	$user = $createCanvasserAction->execute($data);
        Mail::to($user->email)->send(new ProviderHasCreated($user));	
        session()->flash('success','Félicitation, vous venez de vous inscrire en tant chasseur immobilier sur House care. Un email vous a été envoyé prière suivre les instructions afin de finaliser votre inscription. Nous vous contacterons.');
        return back();

    }

}
