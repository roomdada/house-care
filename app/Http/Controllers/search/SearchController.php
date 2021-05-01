<?php

namespace App\Http\Controllers\search;

use App\Domain\Service\Domaine;
use App\Domain\Service\Service;
use App\Domain\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$category = Domaine::withCount('services')->get();
    	$inputs = $request->all();
    	$rules = ['city' => 'required|string', 'service' => 'required|string'];
    	$messages = ['required' => 'Ce champ est obligatoire','string' => 'Veuillez saisir entrer une valeur correcte'];
    	Validator::make($inputs, $rules, $messages)->validate();

    	$service = Service::firstWhere('name', $request->service);


    	$users = User::with('services','city')->where(['validation' => 1, 'inline' => 1, 'admin_validation' => 1,'role_id' => 2])->get();
  

        foreach ($users as $user) {
            if ($user->city->city == $request->city) {
                $providers[] = $user;
            }
        }


    
       foreach ($providers ?? [] as $user) {
            if($user->services->contains('name', $service->name))
            {
                $user_data[] = $user;
            }
       }

     
    	foreach ($users as $user) {
			if ($user->services->contains($service->name)  && $user->city->city == $request->city) {
				$providers = $user;
			}
    	}

        $providers = $user_data ?? [];
        $city = $request->city;
    	
    	return view('pages.search-result',compact('providers','category','service', 'city'));
    }
}
