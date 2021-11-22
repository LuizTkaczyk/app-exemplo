<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    //informando que a propriedade items é um array

    protected $casts = [
        'items' => 'array'
    ];

}
