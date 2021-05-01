<?php

namespace App\Http\Controllers\provider;

use App\Domain\User\Testimony;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonyController extends Controller
{
    public function create(request $testimony)
    {
    	$input = $testimony->all();
    	$rules = ['testimony' => 'required|min:20'];
    	
    	$messages = ['required' => 'ce champ est obligatoire',
					 'min' => 'Ce champ doit contenir au moins 20 caracteres'];

    	Validator::make($input,$rules,$messages);
    	Testimony::create(['user_id' => auth()->user()->id,'testimony' => $testimony->testimony]);
    	session()->flash('success','Votre temoignage a été enregistré!');
    	return back();
    }
}
