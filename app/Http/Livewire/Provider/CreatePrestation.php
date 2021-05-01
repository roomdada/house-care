<?php

namespace App\Http\Livewire\Provider;

use App\Domain\Service\Service;
use App\Domain\User\ServiceUser;
use Livewire\Component;

class CreatePrestation extends Component
{
	public $form = false,$service_id;


	public function form()
	{
		$this->form = true;
	}

	public function store()
	{
        ServiceUser::create(['user_id' => auth()->user()->id,'service_id' => $this->service_id]);
        session()->flash('success','Vous avez ajouté une nouvelle prestation');
        $this->form = false;
        $this->service_id = null;
        return redirect()->route('provider.page.path','service');
	}
    public function render()
    {
    	$services = Service::all();
        return view('livewire.provider.create-prestation',compact('services'));
    }
}
