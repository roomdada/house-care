<?php

namespace App\Http\Controllers\pages;

use App\Domain\City\City;
use App\Domain\House\House;
use App\Domain\Service\Domaine;
use App\Domain\Service\Service;
use App\Domain\User\Testimony;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{


   public function index() 
   {  
       $data = $this->AllData();
       return view('index', $data);
   }

   public function page(string $page) 
   {
       $data = $this->AllData();
   	 if ($page == 'home') {
   	 	 return view('index',$data);
   	 }
   	 return view("pages.$page", $data);
   }


   public function UserAccount()
   {

       $role = auth()->user()->role_id;
        switch ($role) {
            case 1:
                return redirect('administrateur/index');
                break;
            case 2:
                return redirect()->route('provider.page.path','home');
                break;
            case 3:
                return redirect()->route('home.house.provider');
                break;
            case 4:
               return redirect()->route('customer.page','index');
               break;
            default:
                return abord(404);
                break;
        }
   }



   private function AllData() : array
   {
      $services = Service::all();
      $services_paginate = Service::paginate(6);
      $recents = Service::orderByDesc('created_at')->take(3)->get();
      $category = Domaine::withCount('services')->get();
      $houses = House::orderByDesc('created_at')->paginate(6);
      $testimony = Testimony::with('user')->take(8)->orderByDesc('created_at')->get();
      $cities = City::all();
      $data = compact('category','houses','testimony','recents','services','cities');
      return $data;;

   }
}
