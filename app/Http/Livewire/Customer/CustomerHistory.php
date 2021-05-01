<?php

namespace App\Http\Livewire\Customer;

use App\Domain\Checkout\Checkout;
use Livewire\Component;

class CustomerHistory extends Component
{

	public $form = false,$service_id, $comment;

	protected $rules = ['comment' => 'required|string'];
	protected $messages = ['comment.required' => 'Veuillez saisir votre commentaire',
							'comment.string' => 'Entrer une chaine de caractere'];



	public function store()
	{
		$this->validate();
		Checkout::findOrFail($this->service_id)->update(['comment' => $this->comment]);
		$this->form = false;
		$this->service_id = null;
		session()->flash('success','Vous venez de noter cette prestation');
		return back();
 	}

	public function ShowForm($service)
	{
		$this->form = true;
		$this->service_id = $service;

	}


    public function render()
    {
    	$history_services = Checkout::where('email',auth()->user()->email)->paginate(10);
        return view('livewire.customer.customer-history',compact('history_services'));
    }
}
