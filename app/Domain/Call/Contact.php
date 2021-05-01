<?php

namespace App\Domain\Call;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'subject',
        'message',
    ];


    public static function createContactCall($contact) : object
    {
    	return Contact::create($contact);
    }

    public static function deleteContactCall(Contact $contact) : object
    {
    	return $contact->delete();
    }
}
