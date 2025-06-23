<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetOwner extends Model
{
    protected $fillable = [
        'owner_id',
        'pet_id',
    ];
}
