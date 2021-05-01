<?php

namespace App\Http\Controllers\auth;

use App\Domain\Service\Domaine;
use App\Domain\User\User;
use App\Events\UserExist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPassword extends Controller
{
    public function VerifyUserEmail(Request $request)
    {
    	Validator::make($request->all(),
    	 ['email' => 'required|email'], 
    	 ['required' => 'Le champ est obligatoire','email' => 'Entrer un email valide']
    	)->validate();

    	$user = User::firstWhere('email',$request->email);

    	if(!$user)
    	{
    		session()->flash('error', 'Votre email est incorrecte');
    		return back();
    	}

        session()->flash('success', 'Nous vous avons envoyé un email de verification afin de changer votre mot de passe');
        UserExist::dispatch($user);
        return back();



    }



    public function ConfirmNewPassword(Request $request)
    {

    	$inputs = $request->all();
    	$rules = ['password' => 'required|string','password_confirmation' => 'required|string'];
    	$messages = ['required' => 'Ce champ est obligatoire','string' => 'Veuillez entrer une chaine de caractere' ];

    	Validator::make($inputs, $rules, $messages)->validate();
	    	if($request->password != $request->password_confirmation)
	    	{
	    		session()->flash('error','Veuillez entrer des mots de passes identiques');
	    		return back();
	    	}
	    User::firstWhere('email',$request->email)->update(['password' => Hash::make($request->password)]);
	    session()->flash('success','Votre mot de passe a été mis a jour');
	    return redirect()->route('login.path');


    }



    public function LoginForm(User $user)
    {
        return view('pages.users.password-reset.password',['category' => Domaine::all(), 'user' => $user]);
    }
}
