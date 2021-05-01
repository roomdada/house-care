<?php

namespace App\Http\Controllers\services;

use App\Domain\House\House;
use App\Domain\Service\Domaine;
use App\Domain\Service\PriceProposal;
use App\Domain\Service\Service;
use App\Domain\User\ServiceUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function ProviderService(string $service)
    {
        $providers = Service::firstWhere('slug',$service);
        $category = Domaine::withCount('services')->get();
        return view('services.service-details',['providers' => $providers,'category' => $category]);
    }

    public function ServiceDomaine(string $domaine)
    {
    	$domaine = Domaine::firstWhere('slug',$domaine);
        $category = Domaine::withCount('services')->get();
    	return view('services.domaine',['domaine' => $domaine,'category' => $category]);
    }

    public function ProviderDeleteService(string $service)
    {
        $service = Service::firstWhere('slug',$service);
        ServiceUser::where(['user_id' => auth()->user()->id,'service_id' => $service->id])->delete();
        session()->flash('success','Vous venez de supprimé le service '.$service->name.' a vos prestation');
        return back();
    }


    public function HouseDetails(string $house)
    {
        $house = House::with('user')->firstWhere('token',$house);
        $category = Domaine::withCount('services')->get();
        return view('services.house-details',compact('house','category'));

    }


    public function ShowProposalPrice(string $service)
    {
        $service = Service::firstWhere('slug',$service);
        return view('provider.proposal',compact('service'));
    }


    public function CreateProposal(Request $proposal)
    {

        $inputs = $proposal->all();
        Validator::make($inputs, ['price' => 'required'], ['required' => 'Veuillez saisir le prix a proposé'])->validate();

        PriceProposal::create(['service_id' => $proposal->service, 'user_id' => auth()->user()->id, 'price_proposal' => $proposal->price]);
        $service = ServiceUser::where(['user_id' => auth()->user()->id, 'service_id' => $proposal->service])->update(['proposal' => 1]);

        session()->flash('success','Votre proposition de prix a été prise en compte.');
        return redirect()->route('provider.page.path','service');

    }
}

