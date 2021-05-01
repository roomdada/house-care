<?php

namespace App\Domain\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalService extends Model
{
    use HasFactory;
    protected $fillable = ['firstname','lastname','phone','domaine_id','prestation'];

}
