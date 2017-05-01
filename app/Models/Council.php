<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    protected $fillable = [
        'place',
        'time',
        'user1',
        'phone1',
        'user2',
        'phone2',
        'user3',
        'phone3',
        'user4',
        'phone4',
        'user5',
        'phone5',
    ];
}
