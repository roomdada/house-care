<?php

namespace App\Http\Controllers\Call;

use App\Domain\Call\Contact;
use App\Domain\Checkout\Checkout;
use App\Domain\Checkout\HouseCkeckout;
use App\Domain\Service\Domaine;
use App\Domain\Service\Service;
use App\Domain\Call\Actions\CreateCallCanvasserAction;
use App\Domain\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CallController extends Controller
{
    public function call(Request $call)
    {
		$data = $this->validate($call,
			['firstname' => 'required|string',
			'lastname' => 'required|string',
			'email' => 'required|email',
			'subject' => 'required|string',
			'phone' => 'required|string',
			'message' => 'required|string|min:20']);
		
		Contact::createContactCall($data);
		session()->flash('success','Votre message a été envoyé!');
		return back();
    }

    public function ProviderDetails(string $token, string $service)
    {
    	$provider = User::firstWhere('token',$token);
    	$service = Service::firstWhere('slug',$service);
    	$category = Domaine::withCount('services')->get();
    	$data = compact('provider','service','category');
    	return  view('call.provider-details',$data);
    }

    public function CallProvider(string $token, string $service)
    {
    	$provider = User::firstWhere('token',$token);
    	$service = Service::firstWhere('slug',$service);
        $category = Domaine::withCount('services')->get();
    	$data = compact('provider','service','category');
    	return  view('call.create-call',$data);
    }


    public function StoreCallProvider(Request $call, CreateCallProviderAction $createCallProviderAction)
    {
    	$inputs = $call->all();

    	$rules = [
    		'firstname' => 'required|string',
    		'lastname' => 'required|string',
    		'email' => 'required|string|email',
    		'phone' => 'required|string',
    		'city' => 'required|string',
    	];

    	$messages = [
    		'required' => 'Ce champ est obligatoire',
    		'string' => 'Ce champ doit etre une chaine de caractere',
    		'email' => 'Entrer un email valide',
    	];



    	Validator::make($inputs, $rules, $messages)->validate();
    	$checkout = Checkout::create($inputs);
    	$createCallProviderAction->execute($checkout);

    	
    	
    	session()->flash('success','Vous venez de contacter le prestataire. Un agent vous contactera dans quelques instants');
    	return back();


    }


    public function StoreCallCanvasser(Request $call,CreateCallCanvasserAction $createCallCanvasserAction)
    {
        $inputs = $call->all();

        $rules = [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
        ];

        $messages = [
            'required' => 'Ce champ est obligatoire',
            'string' => 'Ce champ doit etre une chaine de caractere',
            'email' => 'Entrer un email valide',
        ];

        Validator::make($inputs, $rules, $messages)->validate();
        $checkout = HouseCkeckout::create($inputs);

        $createCallCanvasserAction->execute($checkout);


        session()->flash('success','Vous venez de contacter le chasseur imobilier pour cette maison. Un de nos agents vous contactera');
        return back();

    }
}
