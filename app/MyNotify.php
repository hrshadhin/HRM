<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyNotify extends Model
{

    protected $table = 'notification';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'value',
        'notiType'
    ];
}
