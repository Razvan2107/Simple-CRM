<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'deal_status',
        'tag'
    ];

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }
}
