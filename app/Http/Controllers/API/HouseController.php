<?php

namespace App\Http\Controllers\API;

use App\Domain\Call\Actions\CreateCallCanvasserAction;
use App\Domain\Checkout\HouseCkeckout;
use App\Domain\House\House;
use App\Http\Controllers\Controller;
use App\Http\Resources\HouseResource;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return HouseResource::collection(House::orderByDesc('created_at')->get());
    }


    /**
     * Display the specified resource.
     *
     * @param  House $house
     * @return \App\Domain\House\House;
     */
    public function show(House $house)
    {
        return new HouseResource($house);
    }

     /**
     * Display the specified resource.
     *
     * @param  House  $house
     * @return \App\Domain\House\House;
     */
    public function getHouseUser(House $house)
    {
        return $house->user;
    }


     /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Client\Response;
     */
    public function postGetHouse(Request $request, CreateCallCanvasserAction $createCallCanvasserAction)
    {
        $inputs = $request->all();
        $request->validate(
            [
                'firstname' => 'string|required',
                'lastname' => 'string|required',
                'email' => 'string|required',
                'phone' => 'string|required',
                'house_id' => 'required',
            ]);


        $checkout = HouseCkeckout::create($inputs);
        $createCallCanvasserAction->execute($checkout);

        return response()->json(['success' => 'Vous venez de contacter le chasseur immobilier pour cette maison il vous contactera dans quelque instant!'], 200);
    }




}
