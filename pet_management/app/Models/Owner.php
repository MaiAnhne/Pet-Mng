<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
     protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function pets()
    {
        return $this->belongsToMany(Pet::class, 'pet_owners');
    }

}
