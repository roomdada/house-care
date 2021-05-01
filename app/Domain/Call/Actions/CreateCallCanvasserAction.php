<?php


namespace App\Domain\Call\Actions;
use App\Domain\Checkout\HouseCkeckout;
use App\Domain\User\User;
use App\Mail\CallAdmin;
use App\Mail\CallCanvasser;
use App\Mail\CallCanvasserAdmin;
use App\Mail\CallCustomer;
use App\Mail\CallProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Image;

final class CreateCallCanvasserAction
{
	public function execute(HouseCkeckout $checkout)
	{

        Mail::to('dsieroger@gmail.com')->send(new CallCanvasserAdmin($checkout));
        Mail::to($checkout->email)->send(new CallCanvasser($checkout));
	}
}	
