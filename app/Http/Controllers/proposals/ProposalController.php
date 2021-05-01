<?php

namespace App\Http\Controllers\proposals;

use App\Domain\User\ProposalProvider;
use App\Domain\User\ProposalService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProposalController extends Controller
{
    public function CreateProviderProvider(Request $proposal)
    {
    	$inputs = $proposal->all();

    	$rules = [
    		'firstname' => 'required|string',
    		'lastname' => 'required|string',
    		'phone' => 'required|string',
    	];

    	$messages = [
    		'required' => 'Ce champ est obligatoire',
    		'string' => 'Ce champ doit etre une chaine de caractere',
    	];
    	Validator::make($inputs, $rules, $messages)->validate();

    	ProposalProvider::create($inputs);
    	session()->flash('success','Votre propositon a été enregistré nous le contacterons');
    	return back();
    }


    public function CreateServiceProvider(Request $proposal)
    {
    	$inputs = $proposal->all();

    	$rules = [
    		'prestation' => 'required|string',
    		'firstname' => 'required|string',
    		'lastname' => 'required|string',
    		'phone' => 'required|string',
    		'domaine_id' => 'required|string',
    	];

    	$messages = [
    		'required' => 'Ce champ est obligatoire',
    		'string' => 'Ce champ doit etre une chaine de caractere',
    	];


    	Validator::make($inputs, $rules, $messages)->validate();

    	ProposalService::create($inputs);
    	session()->flash('success','Merci pour la propostion de service');
    	return back();
    }



}
