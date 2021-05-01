<?php

namespace App\Http\Controllers\house;

use App\Domain\City\City;
use App\Domain\House\House;
use App\Domain\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HouseController extends Controller
{
    public function index()
    {
        $cities = City::all();
    	return view('house-provider.create-house', compact('cities'));
    }

    public function StoreHouse(Request $house)
    {

    	$inputs = $house->all();

    	$rules = [
    			'city_id' => 'required',
				'place' => 'required',
				'price' => 'required',
				'image_2' => 'required|file|max:1024',
				'image_2' => 'required|file|max:1024'
			];

    	$messages = [
    				'required' => 'Ce champ est obligatoire',
    				'string' => 'Ce champ doit etre une chaine de caractere',
    				'max' => 'La taille de votre image est trop grande',
    				'file' => 'Veuillez entrer un fichier'
    			 ];

    	Validator::make($inputs, $rules, $messages)->validate();

    	$image_1 = $house->image_1->store('public/house-image');
    	$image_2 = $house->image_2->store('public/house-image');
    	$image_3 = $house->image_3 ? $house->image_3->store('public/house-image') : null;
    	$image_4 = $house->image_4 ? $house->image_4->store('public/house-image') : null;

    	$inputs['user_id'] = auth()->user()->id;
    	$inputs['image_1'] = $image_1;
    	$inputs['image_2'] = $image_2;
    	$inputs['image_3'] = $image_3;
    	$inputs['image_4'] = $image_4;
    	$inputs['token'] = Str::random(60);

    	House::create($inputs);
    	session()->flash('success','Vous venez d\'ajouter un nouveau appartement');
    	return back();
    }



    public function EditHouse(string $token)
    {
    	$house = House::firstWhere('token',$token);
    	return view('house-provider.edit-house',compact('house'));
    }



    

    public function StoreEdit(Request $request)
    {


    	$inputs = $request->all();

    	$house = House::findOrFail($request->house_id);

    	$image_3 = $request->image_3 ? $request->image_3->store('public/house-image') : $house->image_3;
    	$image_4 = $request->image_4 ? $request->image_4->store('public/house-image') : $house->image_4;
    	$image_1 = $request->image_1 ? $request->image_1->store('public/house-image') : $house->image_1;
    	$image_2 = $request->image_2 ? $request->image_2->store('public/house-image') : $house->image_2;

    	$inputs['image_1'] = $image_1;
    	$inputs['image_2'] = $image_2;
    	$inputs['image_3'] = $image_3;
    	$inputs['image_4'] = $image_4;

    	House::findOrFail($request->house_id)->update($inputs);
    	session()->flash('success','Modification de l\'appartement');
    	return back();
    }




    public function StoreEditAccount(Request $request)
    {
    	User::findOrFail(auth()->user()->id)->update($request->all());
    	session()->flash('success','Votre compte a été mis a jour!');
    	return back();
    }
}
