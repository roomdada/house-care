<?php

namespace App\Http\Livewire\Canvasser;

use App\Domain\House\House;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateHouse extends Component
{

	use WithFileUploads;
	protected $paginationTheme = 'bootstrap';
	public $form = false;

	public $city, $place, $price, $image_1, $image_2, $image_3, $image_4,$description;
	public function form()
	{
		return redirect()->route('provider.show');
	}


	public function delete(House $house)
	{
		$house->delete();
		session()->flash('success','L\'appartement a été supprimé!');
		return back();
	}


	

    public function render()
    {
        return view('livewire.canvasser.create-house',['houses' => House::where('user_id', auth()->user()->id)->paginate(5)]);
    }
}
