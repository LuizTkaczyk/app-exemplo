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

    //para editar os eventos
    protected $guarded = [];

    // Informando ao laravel que tem um novo campo de data
    protected $datas = ['data'];

    public function user(){
        return $this->belongTo('App\Models\User');
    }

    //função muitos para muitos
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

}
