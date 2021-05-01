<?php

namespace App\Http\Controllers\auth;

use App\Domain\User\Actions\CreateCustomerAction;
use App\Http\Controllers\Controller;
use App\Mail\ProviderHasCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function RegisterCustomer(Request $provider,CreateCustomerAction $createCustomerAction){

    	$inputs = $provider->all();

    	$data = $rules = [
    		'firstname' => 'required|string',
    		'lastname' => 'required|string',
    		'phone' => 'required|string',
    		'email' => 'required|string|email|unique:users',
    		'validation' => 'accepted',
    		'password' => 'required|string|confirmed',
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
    	$user = $createCustomerAction->execute($data);
        Mail::to($user->email)->send(new ProviderHasCreated($user));	
        session()->flash('success','Votre compte a été crée nous vous avons envoyé un email de confirmation!');
        return back();

    }
}
