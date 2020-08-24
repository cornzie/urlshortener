<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urls extends Model
{
    //
    protected $table = 'urls';
    protected $fillable = [
        'url',
        'code',
    ];
}
