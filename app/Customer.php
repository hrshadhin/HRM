<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Customer extends Model
{
    use SoftDeletes;

    protected $dates = ['dob','entryDate'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cellNo',
        'phoneNo',
        'email',
        'dob',
        'contactPerson',
        'contactPersonCellNo',
        'fatherName',
        'motherName',
        'spouseName',
        'nidNo',
        'passportNo',
        'mailingAddress',
        'presentAddress',
        'permanentAddress',
        'birthCertificate',
        'passport',
        'photo',
        'companyName',
        'designation',
        'cContactPerson',
        'cContactPersonCellNo',
        'cCellNo',
        'cPhoneNo',
        'cFaxNo',
        'cEmail',
        'cAddress',
        'cNote',
        'active',
        'entryDate',
        'users_id',

    ];
    public function entry() {
        return $this->belongsTo('App\User','users_id')->withTrashed()->select(['id','name']);
    }


    public function rents()
    {
        return $this->hasMany('App\Rent','customers_id');
    }
    public function collections()
    {
        return $this->hasMany('App\RentCollection','customers_id');
    }

    function setDobAttribute($value)
    {
        if(strlen($value)){
            $this->attributes['dob'] =  Carbon::createFromFormat('d/m/Y', trim($value));
        }
        else{
            $this->attributes['dob'] = null;
        }
    }
    public function getDobAttribute($value)
    {
        if(strlen($value)){
           return Carbon::parse($value)->format('d/m/Y');
        }
        else{
           return '';
        }
    }
    function setEntryDateAttribute($value)
    {
        $this->attributes['entryDate'] = Carbon::createFromFormat('d/m/Y', trim($value));
    }

}
