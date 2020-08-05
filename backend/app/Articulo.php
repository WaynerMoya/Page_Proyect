<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'article';
    protected $fillable = [
        'name', 'description', 'price','code'
    ];

}
