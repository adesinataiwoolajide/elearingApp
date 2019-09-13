<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Courses extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'courses';
    protected $primaryKey = 'course_id';
    protected $fillable = [
        'course_title', 'course_code', 'course_unit', 'course_file', 'course_status'
    ];

    protected static $logAttributes = ['course_code', 'course_title'];

    public function getCourseFileAttribute($value){
        return ($value);
    }
    public function setCourseFileAttribute($value){
        return $this->attributes['course_file'] = ($value);
    }

    public function getCourseStatusAttribute($value){
        return ucwords($value);
    }
    public function setCourseStatusAttribute($value){
        return $this->attributes['course_status'] = ucwords($value);
    }

    public function getCourseUnitAttribute($value){
        return ($value);
    }
    public function setCourseUnitAttribute($value){
        return $this->attributes['course_unit'] = ($value);
    }
    public function getCourseTitleAttribute($value){
        return ucwords($value);
    }
    public function setCourseTitleAttribute($value){
        return $this->attributes['course_title'] = ucwords($value);
    }

    public function getCourseCodeAttribute($value){
        return strtoupper($value);
    }
    public function setCourseCodeAttribute($value){
        return $this->attributes['course_code'] = strtoupper($value);
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

    public function allocation(){
        return $this->hasMany('App\CourseAllocations','allocation_id', 'course_id');
    }

    public function assignment(){
        return $this->hasMany('App\Assignments','assignment_id', 'course_id');
    }

}
