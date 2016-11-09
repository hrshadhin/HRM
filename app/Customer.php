<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Customer extends Model
{
  use SoftDeletes;

  protected $dates = ['dob','created_at'];
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'title',
    'code',
    'name',
    'cellNo',
    'phoneNo',
    'email',
    'dob',
    'contactPerson',
    'contactPersonCellNo',
    'referenceName',
    'referenceContactNo',
    'mailingAddress',
    'profession',
    'active',
    'salesPerson',
    'groupName',
    'photo'
  ];

  function setDobAttribute($value)
  {
    $this->attributes['dob'] = Carbon::createFromFormat('d/m/Y', $value);
  }

}
