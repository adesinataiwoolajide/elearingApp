<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Staffs extends Model
{
    use SoftDeletes;
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'staffs';
    public $primaryKey = 'staff_id';
    protected $guard_name = 'web';
    protected $fillable = [
        'staff_name', 'staff_email', 'phone_number', 'initial',
    ];
    protected static $logAttributes = ['staff_name', 'staff_email'];

    public function getStaffNameAttribute($value){
        return ucwords($value);
    }

    public function setStaffNameAttribute($value){
        return $this->attributes['staff_name'] = ucwords($value);
    }

    public function getStaffEmailAttribute($value){
        return $value;
    }

    public function setStaffEmailAttribute($value){
        return $this->attributes['staff_email'] = $value;
    }

    public function getPhoneNumberAttribute($value){
        return ($value);
    }

    public function setPhoneNumberAttribute($value){
        return $this->attributes['phone_number'] = ($value);
    }

    public function geInitialAttribute($value){
        return $value;
    }

    public function setInitialAttribute($value){
        return $this->attributes['initial'] = $value;
    }

    public function getCreatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getDeletedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }


    
}
