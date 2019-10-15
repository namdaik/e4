<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{

    public $timestap =false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'doamain_id',
        'url',
    ];
}