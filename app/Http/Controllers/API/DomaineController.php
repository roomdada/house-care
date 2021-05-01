<?php

namespace App\Http\Controllers\API;

use App\Domain\Service\Domaine;
use App\Domain\Service\Service;
use App\Http\Controllers\Controller;
use App\Http\Resources\DomaineResource;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return DomaineResource::collection(Domaine::with('services')->orderByDesc('created_at')->get());
    }

  
    public function show(Domaine $domaine)
    {
        return $domaine->services;
    }
  
}
