<?php

namespace App\Http\Livewire\Canvasser;

use App\Domain\Checkout\Checkout;
use App\Domain\Checkout\HouseCkeckout;
use App\Domain\House\House;
use Livewire\Component;

class History extends Component
{
    public function render()
    {
    	$history = House::where('user_id',auth()->user()->id)->get();
    	$check = HouseCkeckout::with('house')->get();
        return view('livewire.canvasser.history',compact('check'));
    }
}
