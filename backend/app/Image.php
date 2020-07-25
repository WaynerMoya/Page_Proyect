<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'name', 'sizeText', 'text','font','bold','cursive','orientation','animation'
    ];

}
