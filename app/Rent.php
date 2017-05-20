<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\User;
use App\Flat;

class Rent extends Model
{
    use SoftDeletes;

    protected $dates = ['entryDate','deedStart','deedEnd'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'projects_id',
        'customers_id',
        'flats_id',
        'rentNo',50,
        'perSftRent',
        'rent',
        'securityMoney',
        'advanceMoney',
        'monthlyDeduction',
        'monthlyDeductionTax',
        'advanceMoney',
        'utilityCharge',
        'serviceCharge',
        'delayCharge',
        'note',
        'deepPaper',
        'deedStart',
        'deedEnd',
        'othersPaper',
        'status', // 1 for active 0 for inactive
        'entryDate',
        'users_id',
    ];

    public function project() {
        return $this->belongsTo('App\Project','projects_id')->withTrashed()->select(['id','name']);
    }
    public function flat() {
        return $this->belongsTo('App\Flat','flats_id')->withTrashed()->select(['id','description']);
    }
    public function customer() {
        return $this->belongsTo('App\Customer','customers_id')->withTrashed()->select(['id','name','cellNo','permanentAddress','photo']);
    }
    public function entry() {
        return $this->belongsTo('App\User','users_id')->withTrashed()->select(['id','name']);
    }
    public function collections()
    {
        return $this->hasMany('App\RentCollection','rents_id');
    }


    function setEntryDateAttribute($value)
    {
        $this->attributes['entryDate'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
    function setDeedStartAttribute($value)
    {
        $this->attributes['deedStart'] = Carbon::createFromFormat('m-Y', $value)->format('Y-m-d');
    }
    function setDeedEndAttribute($value)
    {
        $this->attributes['deedEnd'] = Carbon::createFromFormat('m-Y', $value)->format('Y-m-d');
    }
}
