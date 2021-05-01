<?php

namespace App\Http\Controllers\dashboard\provider;

use App\Domain\Service\Domaine;
use App\Domain\Service\Service;
use App\Domain\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageDashController extends Controller
{
    public function page(string $page)
    {
    	$category = Domaine::count();
    	$services = Service::count();
        $users_indispo = User::where(['admin_validation' => 1, 'validation' => 1, 'disponible' => 1])->orderByDesc('created_at')->paginate(10);

        $proposal = User::findOrFail(auth()->user()->id)->services;
    	$data = compact('category','services','proposal','users_indispo');
      
    	return view("provider.$page",$data);
    }


    public function house_page(string $page)
    {
    	$category = Domaine::count();
    	$services = Service::count();
    	$data = compact('category','services');
    	return view("house-provider.$page",$data);
    }


    public function HouseProvider()
    {
    	$category = Domaine::count();
    	$services = Service::count();
    	$data = compact('category','services');
    	return view("house-provider.home",$data);
    }



    public function UserStatus()
    {
        $user = auth()->user();
        if ($user->disponible) {
           $user->update(['disponible' => 0]);
           return back();   
        }

        $user->update(['disponible' => 1]);
        return back();  
    }
}
