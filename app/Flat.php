<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\User;
use App\Project;

class Flat extends Model
{
    use SoftDeletes;

    protected $dates = ['entryDate'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'projects_id',
        'entryDate',
        'users_id',
        'floor',
        'type',
        'parking',
        'parkingNo',
        'size',
        'description'
    ];

    public function project() {
        return $this->belongsTo('App\Project','projects_id');
    }
    public function entry() {
        return $this->belongsTo('App\User','users_id');
    }

    function setEntryDateAttribute($value)
    {
        $this->attributes['entryDate'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
}
