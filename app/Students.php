<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Students extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'students';
    public $primaryKey = 'student_id';
    protected $guard_name = 'web';
    protected $fillable = [
        'student_name', 'student_email', 'phone_number', 'matric_number','level', 'program'
    ];
    protected static $logAttributes = ['student_name', 'student_email', 'matric_number'];

    public function getLevelAttribute($value){
        return ($value);
    }
    public function setLevelAttribute($value){
        return $this->attributes['level'] = ($value);
    }
    public function getProgramAttribute($value){
        return ucwords($value);
    }
    public function setProgramAttribute($value){
        return $this->attributes['program'] = ucwords($value);
    }
    public function getStudentNameAttribute($value){
        return ucwords($value);
    }

    public function setStudentNameAttribute($value){
        return $this->attributes['student_name'] = ucwords($value);
    }

    public function getStudentEmailAttribute($value){
        return $value;
    }

    public function setStudentEmailAttribute($value){
        return $this->attributes['student_email'] = $value;
    }

    public function getPhoneNumberAttribute($value){
        return ($value);
    }

    public function setPhoneNumberAttribute($value){
        return $this->attributes['phone_number'] = ($value);
    }

    public function getMatricNumberAttribute($value){
        return $value;
    }

    public function setMatricNumberAttribute($value){
        return $this->attributes['matric_number'] = $value;
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

    public function assignment(){
        return $this->hasMany('App\AssignmentSolutions','solution_id', 'student_id');
    }

    public function results(){
        return $this->hasMany('App\AssignmentResultss', 'result', 'student_id');
    }

}
