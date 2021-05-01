<?php

namespace App\Http\Controllers\admin;

use App\Domain\Call\Contact;
use App\Domain\City\City;
use App\Domain\Service\Domaine;
use App\Domain\Service\PriceProposal;
use App\Domain\Service\Service;
use App\Domain\User\ProposalProvider;
use App\Domain\User\Testimony;
use App\Domain\User\User;
use App\Http\Controllers\Controller;
use App\Mail\UserAccept;
use App\Mail\UserAccountConfirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function page(string $page)
    {

    	$users = User::orderByDesc('created_at')->where('role_id','!=',1)->paginate(10);
      $users_indispo = User::where(['admin_validation' => 1, 'validation' => 1, 'disponible' => 1])->orderByDesc('created_at')->paginate(10);

    	$data = compact('users','users_indispo');
    	return view("panel.$page",$data);
    }


    public function DeleteUser(string $token)
    {
    	User::firstWhere('token',$token)->delete();
    	session()->flash('success','Utilisateur supprimé');
    	return back();
    }


    public function ServicePage(string $page)
    {
      $prices = PriceProposal::with('user','service')->orderByDesc('created_at')->paginate(10);
    	$users = User::orderByDesc('created_at')->paginate(10);
    	$categories = Domaine::withCount('services')->get();
    	$services  = Service::paginate(5);
    

    	$data = compact('users','categories','services','prices');

    	return view("panel.service.$page",$data);
    }


    public function storeService(Request $service)
    {
    	$inputs = $service->all();
    	$rules = ['name' => 'required|string|unique:domaines','image' => 'required|file|max:1024'];

    	$messages = ['required' => 'Ce champ est obligatoire','string' => 'Ce champ doit etre une chaine de caractere', 'file' => 'Veuiller entrer un fichier','unique' => 'Le domaine existe déja' ];

    	Validator::make($inputs, $rules, $messages)->validate();

    	$icone = $service->image->store('public/service/svg');

    	Domaine::create(['name' => $service->name,'slug' => Str::slug($service->name),'icone' => $icone]);
    	session()->flash('success','Le service a été enregistré!');
    	return back();
    }


    public function DeleteDomaine(string $domaine)
    {
    	Domaine::firstWhere('slug',$domaine)->delete();
    	session()->flash('success','Le service a été supprimé!');
    	return back();

    }


    public function ShowDomaine(Domaine $domaine)
    {
    	return view('panel.service.edit-category',['domaine' => $domaine]);
    }



    public function StoreEditDomaine(Request $domaine)
    {

    	$old_domaine = Domaine::findOrFail($domaine->service_id);
    	$image = $domaine->image ? $domaine->image->store('public/service/svg') : $old_domaine->image;
    	$old_domaine->update(['name' => $domaine->name, 'slug' => Str::slug($domaine->name),'icone' => $image]);
    	session()->flash('success','Le service a été mis a jour!');
    	return back();
    }


    public function ShowProviderProposal()
    {
    	$suggestions = ProposalProvider::paginate(10);
    	return view('panel.prestataire.suggestion',compact('suggestions'));
    }



    public function DeleteProposalProvider(int $proposal)
    {
        ProposalProvider::findOrFail($proposal)->delete();
        session()->flash('success','La suggestion a été supprimée');
        return back();
    }


    public function DeleteService(string $slug)
    {
    	Service::firstWhere('slug',$slug)->delete();
    	session()->flash('success','La prestation a été supprimée');
    	return back();
    }

     public function CreateService(Request $service)
    {
    	$inputs = $service->all();
    	dump($inputs);
    	$rules = [
    		'name' => 'required|string|unique:services',
    		'price' => 'required|string',
    		'domaine' => 'required|string',
    		'image' => 'required|file|max:1024'
    	];



    	$messages = ['required' => 'Ce champ est obligatoire','string' => 'Ce champ doit etre une chaine de caractere', 'file' => 'Veuiller entrer un fichier','unique' => 'Le service existe déja' ];

    	Validator::make($inputs, $rules, $messages)->validate();

    	$image = $service->image->store('public/service/images/');

    	Service::create(
    		[
    			'name' => $service->name,
    			'price' => $service->price,
    			'slug' => Str::slug($service->name),
    			'domaine_id' => $service->domaine,
    			'icone' => $image
    		]);
    	session()->flash('success','La prestation a été enregistré!');
    	return back();
    }



    public function ShowService(Service $service)
   	{
   		$domaines = Domaine::all();
   		return view('panel.service.edit-prestation',compact('service','domaines'));
   	}


   	public function StoreEditService(Request $service)
   	{


   		$prestation = Service::findOrFail($service->service);


    	$image = $service->image ? $service->image->store('public/service-img') : $prestation->image;


    	$prestation->update(
    		[
    			'name' => $service->name,
    			'price' => $service->price,
    			'slug' => Str::slug($service->name),
    			'domaine_id' => $service->domaine,
    			'image' => $image
    		]);
    	session()->flash('success','La prestation a été mise a jour!');
    	return back();
   	}



   	public function ProviderPage(string $page)
   	{
   		$customers = User::where('role_id',4)->paginate(10);
   		$providers = User::where('role_id',2)->paginate(10);
      $users_indispo = User::where(['admin_validation' => 1, 'validation' => 1, 'disponible' => 0])->paginate(10);
   		$users = User::where('role_id',2)->orWhere('role_id',3)->paginate(10);
   		$providers_offline = User::where(['role_id' => 2, 'disponible' => 1, 'inline' => 0])->paginate(10);
   		$proposal_providers = ProposalProvider::orderByDesc('created_at')->paginate(10);
   		$house_providers = User::where('role_id',3)->paginate(10);
      $users_identity_card = User::where(['validation' => 1, 'admin_validation' => 0])->paginate(10);
   		$data = compact('customers','providers','house_providers','proposal_providers','providers_offline','users','users_indispo', 'users_identity_card');
   		return view("panel.prestataire.$page",$data);
   	}



   	public function DeleteProviderProposal(int $user)
   	{
   		ProposalProvider::firstWhere('id',$user)->delete();
   		session('success','La suggestion a été supprimée');
   		return back();
   	}


   	public function AcceptUserAccount(string $token)
   	{
   		User::firstWhere('token',$token)->update(['admin_validation' => 1]);
   		$user = User::firstWhere('token',$token);
   		session()->flash('success','L\'utlisateur est desormais membre de House Care');
   		//Mail::to($user->email)->send(new UserAccountConfirm($user));
   		return back();
   	}


   	public function OtherPages(string $page)
   	{
   		$testimonies = Testimony::orderByDesc('created_at')->paginate(10);
   		$messages = Contact::orderByDesc('created_at')->paginate(10);
      $cities = City::paginate(10);
   		$data = compact('testimonies','messages','cities');

   		return view("panel.autres.$page",$data);
   	}


   	public function DeleteMessage(int $message)
   	{
   		Contact::findOrFail($message)->delete();
   		session()->flash('success','Le message a été supprimé');
   		return back();
   	}



   	public function DeleteTestimony(int $testimony)
   	{
   		Testimony::findOrFail($testimony)->delete();
   		session()->flash('success','Suppression du temoignage');
   		return back();
   	}



    public function DeleteProposalPrice(int $proposal)
    {
      PriceProposal::findOrFail($proposal)->delete();
      session()->flash('success','Proposition supprimée');
      return back();
    }



    public function AddCity(Request $request)
    {
       $data = $request->all();
       $rules = ['city' => 'required|string|unique:cities'];
       $messages = ['string' => 'Ce champ doit etre une chaine de caractere', 'required' => 'Ce champ est obligatoire','unique' => 'Cette commune existe deja!'];
       Validator::make($data, $rules, $messages)->validate();
       City::create(['city' => ucfirst($data['city']), 'slug' => Str::slug($data['city'])]);
       session()->flash('success', 'La commune a enregistrée');
       return back();

    }


    public function DeleteCity(City $city)
    {
        $city->delete();
        session()->flash('success','La commune a été supprimée!');
        return back();
    }


    public function ShowUser(User $user)
    {
        return view('panel.prestataire.user-details', compact('user'));
    }




}
