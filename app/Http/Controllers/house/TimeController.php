<?php

namespace App\Http\Controllers\house;

use App\Domain\User\Timetable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeController extends Controller
{
    public function Store(Request $request)
    {
    	$inputs = $request->all();
    	Validator::make($inputs, ['day' => 'required|date'], ['required' => 'Veuillez choisir un date','date' => 'Entrer un date'])->validate();


    	$request['user_id'] = auth()->user()->id;
    	Timetable::create($request->all());
    	session()->flash("success",'Emploi du temps mis a jour!');
    	return back();
    }


    public function delete(int $id)
    {
    	Timetable::findOrFail($id)->delete();
    	session()->flash('success','Suppression avec succes');
    	return back();
    }
}
