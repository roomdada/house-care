<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{


	public $password, $old_password, $password_confirmation;


	protected $rules = ['password' => 'required','old_password' => 'required','password_confirmation' => 'required'];

	protected $messages = [
		'password.required' => 'Ce champ est obligatoire',
		'old_password.required' => 'Ce champ est obligatoire',
		'password_confirmation.required' => 'Ce champ est obligatoire',
	];


	public function store()
	{
		$this->validate();

		if (!password_verify($this->old_password, auth()->user()->password)) {
			session()->flash('error','Votre mot de passe actuel est incorrect');
			$this->resetInput();
			return back();
		}

		if ($this->password != $this->password_confirmation) {
			session()->flash('error','Veuillez confirmer le nouveau mot de passe');
			$this->resetInput();
			return back();
		}


		auth()->user()->update(['password' => Hash::make($this->password)]);
		session()->flash('success','Votre mot de passe a été mis a jour');
		$this->resetInput();
		return back();


	}


	private function resetInput()
	{
		$this->password = null;
		$this->old_password = null;
		$this->password_confirmation = null;
	}
    public function render()
    {
        return view('livewire.auth.password');
    }
}
