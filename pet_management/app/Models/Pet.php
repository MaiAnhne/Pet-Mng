<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'name',
        'species',
        'age',
        'description',
    ];

    public function owners()
    {
        return $this->belongsToMany(Owner::class, 'pet_owners');
    }
}
