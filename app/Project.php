<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Project extends Model
{
    use SoftDeletes;


    protected $dates = ['entryDate'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'projectId',
        'projectType',
        'name',
        'entryDate',
        'areas_id',
        'address',
        'description',
        'storied',
        'noOfUnits',
        'noOfFloor',
        'noOfCarParking',
        'unitSize',
        'lift',
        'generator',
        'users_id'
    ];

    public function area() {
        return $this->belongsTo('App\Area','areas_id')->withTrashed();
    }
    public function entry() {
        return $this->belongsTo('App\User','users_id')->withTrashed();
    }
    public function flats()
    {
        return $this->hasMany('App\Flat','projects_id');
    }
    public function expenses()
    {
        return $this->hasMany('App\Expense','projects_id');
    }
    public function rents()
    {
        return $this->hasMany('App\Rent','projects_id');
    }
    function setEntryDateAttribute($value)
    {
        $this->attributes['entryDate'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
}
