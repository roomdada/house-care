<?php

namespace App\Http\Controllers\API;

use App\Domain\Call\Actions\CreateCallProviderAction;
use App\Domain\Checkout\Checkout;
use App\Domain\Service\Service;
use App\Domain\User\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return ServiceResource::collection(Service::orderByDesc('created_at')->get());
    }

   
 
    /**
     * Display the specified resource.
     *
     * @param  Service $service
     * @return App\Domain\Service\Service;
     */
    public function show(Service $service)
    {
        $users = User::with('services','city')->where(['validation' => 1, 'inline' => 1, 'admin_validation' => 1,'role_id' => 2])->get();
        foreach ($users as $user) {
            if ($user->services->contains('name', $service->name)) {
                    $providers[] = $user;
            }
        }

        return $providers ?? [];
    }

  
    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function postGetService(Request $request, CreateCallProviderAction $createCallProviderAction)
    {
       $inputs = $request->all();
       $request->validate(
        [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'city' => 'required|string',
            'service_id' => 'required',
            'user_id' => 'required',
        ]);



       $checkout = Checkout::create($inputs);
       $createCallProviderAction->execute($checkout);

       return response()->json(['success' => 'Vous venez de contacter le prestataire il vous contactera dans quelques instants']);
    }


    



}
