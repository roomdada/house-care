<?php


namespace App\Domain\Call\Actions;
use App\Domain\Checkout\Checkout;
use App\Domain\User\User;
use App\Mail\CallAdmin;
use App\Mail\CallCustomer;
use App\Mail\CallProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Image;

final class CreateCallProviderAction
{
	public function execute(Checkout $checkout)
	{

        $user = User::findOrFail($checkout->user_id);
        Mail::to('dsieroger@gmail.com')->send(new CallAdmin($checkout,$user));
        Mail::to($checkout->email)->send(new CallCustomer($checkout,$user));
        Mail::to($user->email)->send(new CallProvider($checkout,$user));
	}
}	
