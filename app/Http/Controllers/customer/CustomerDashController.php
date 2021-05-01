<?php

namespace App\Http\Controllers\customer;

use App\Domain\Checkout\Checkout;
use App\Domain\Checkout\HouseCkeckout;
use App\Domain\House\House;
use App\Domain\Service\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashController extends Controller
{
    public function page(string $page){

    	$service_count = Checkout::where('email',auth()->user()->email)->count();
    	$house_count = HouseCkeckout::where('email',auth()->user()->email)->count();
    	$services = Service::count();
    	$data = compact('service_count','house_count','services');
    	return view("customer.$page",$data);
    }
}
