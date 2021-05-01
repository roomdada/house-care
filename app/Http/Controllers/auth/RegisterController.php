<?php

namespace App\Http\Controllers\auth;

use App\Domain\City\City;
use App\Domain\Service\Domaine;
use App\Domain\Service\Service;
use App\Domain\User\Actions\CreateUserAction;
use App\Domain\User\ServiceUser;
use App\Domain\User\User;
use App\Http\Controllers\Controller;
use App\Mail\ProviderCreate;
use App\Mail\ProviderHasCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function page(string $type_user)
    {
    	$services = Service::all();
    	$category = Domaine::all();
        $cities = City::all();
    	$data = compact('services','category', 'cities');
    	return view("pages.users.register.$type_user",$data);
    }


    public function RegisterProvider(Request $provider,CreateUserAction $createUserAction){

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
    		'service_1' => 'required|string',
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
    	$user = $createUserAction->execute($data);
        Mail::to($user->email)->send(new ProviderHasCreated($user));

        ServiceUser::create(['user_id' => $user->id,'service_id' => $provider->service_1]);
        if ($provider->service_2) {
              ServiceUser::create(['user_id' => $user->id,'service_id' => $provider->service_2]);
        }


        session()->flash('success','Félicitation, vous venez de vous inscrire en tant prestataire sur House care. Un email vous a été envoyé prière suivre les instructions afin de finaliser votre inscription. Nous vous contacterons.');
        return back();

    }


    public function ProviderConfirmAccount(string $token)
    {

        $user = User::firstWhere('token',$token);
        if ($user->validation != 1) {
            $user->update(['validation' => 1]);
            session()->flash('success','Votre compte a éte confirmé!');
            return redirect('/login');
            
            
        }
        session()->flash('success','Votre compte a déja éte confirmé!');
        return redirect('/login');
    }




    public function reset(Request $request)
    {
        $inputs = $request->all();

        $rules = ['old_password' => 'required','password' => 'required','password_confirmation' => 'required'];

        $messages = ['required' => 'Ce champ obligatoire'];

        Validator::make($inputs, $rules, $messages)->validate();
    }
}
