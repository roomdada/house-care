<?php

namespace App\Http\Controllers\API;

use App\Domain\User\Actions\CreateCanvasserAction;
use App\Domain\User\Actions\CreateCustomerAction;
use App\Domain\User\Actions\CreateUserAction;
use App\Domain\User\ServiceUser;
use App\Http\Controllers\Controller;
use App\Mail\ProviderHasCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{


    public function show(User $user)
    {
        return $user;
    }
    
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProvider(Request $request, CreateUserAction $createUserAction)
    {
        $data = $request->all();
        dump($data);
        $request->validate(
            [
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
                'city' => 'required|string',
                'identity' => 'required|file',
                'password_confirmation' => 'required|string',
            ]);



            $data['watsapp']  = $provider->watsapp;
            $data['moving_means']  = $provider->moving_means;
            $user = $createUserAction->execute($data);
            Mail::to($user->email)->send(new ProviderHasCreated($user));
            ServiceUser::create(['user_id' => $user->id,'service_id' => $provider->service_1]);
            if ($provider->service_2) {
                  ServiceUser::create(['user_id' => $user->id,'service_id' => $provider->service_2]);
        }

        return response()->json(['success' => 'Félicitation, vous venez de vous inscrire en tant prestataire sur House care. Un email vous a été envoyé prière suivre les instructions afin de finaliser votre inscription. Nous vous contacterons']);
    }



    public storeCanvasser(Request $request, CreateCanvasserAction $createCanvasserAction)
    {
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
            'city' => 'required|string',
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
        response()->json(['success' => 'Félicitation, vous venez de vous inscrire en tant chasseur immobilier sur House care. Un email vous a été envoyé prière suivre les instructions afin de finaliser votre inscription. Nous vous contacterons.']);
    }


    public function storeCustomer(Request $request, CreateCustomerAction $createCustomerAction)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
