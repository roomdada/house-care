<?php

namespace App\Http\Controllers\auth;

use App\Domain\Service\Domaine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Domain\User\User;

class LoginController extends Controller
{
    public function index()
    {
    	$category = Domaine::all();
    	return view('pages.users.login.login',compact('category'));
    }


      /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
      
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role_id' => 4])) {
            $request->session()->regenerate();
            return redirect()->route('customer.page','index');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role_id' => 1])) {
            $request->session()->regenerate();
            return redirect()->intended('administrateur/index');
        }



        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'validation' => 1, 'role_id' => 2])) {
            $request->session()->regenerate();
            return redirect()->route('provider.page.path','home');
        }


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'validation' => 1, 'role_id' => 3])) {
            $request->session()->regenerate();
            return redirect()->route('home.house.provider');
        }


        session()->flash('error','Email ou mot de passe incorrect!');
        return back();
    }
  

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request){
        $request->session()->invalidate();
	    $request->session()->regenerateToken();
	    session()->flash('success','Vous etes deconnecté!');
	    return redirect('/login');
    }

}
