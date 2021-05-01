<?php

namespace App\Http\Controllers\house;

use App\Domain\House\House;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class appController extends Controller
{
   public function store(Request $house)
   {

    	$inputs = $house->all();

    	$house = House::findOrFail($house->house_id);
    	dd($house);

    	$image_3 = $house->image_3 ? $house->image_3->store('public/house-image') : null;
    	$image_4 = $house->image_4 ? $house->image_4->store('public/house-image') : null;
    	$image_1 = $house->image_1 ? $house->image_1->store('public/house-image') : null;
    	$image_2 = $house->image_2 ? $house->image_2->store('public/house-image') : null;

    	if ($image_1) {
    		
    	}

    	$inputs['image_1'] = $image_1;
    	$inputs['image_2'] = $image_2;
    	$inputs['image_3'] = $image_3;
    	$inputs['image_4'] = $image_4;

    	House::findOrFai($house->house_id)->update($inputs);
    	session()->flash('success','Vous venez d\'ajouter un nouveau appartement');
    	return back();
   }
}
