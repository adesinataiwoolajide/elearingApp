<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class CourseAllocations extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'course_allocations';
    protected $primaryKey = 'allocation_id';
    protected $fillable = [
        'course_id', 'user_id', 'program', 'level', 'session'
    ];

    protected static $logAttributes = ['course_id', 'user_id', 'program', 'level', 'session'];

    public function getSessionAttribute($value){
        return ($value);
    }
    public function setSessionAttribute($value){
        return $this->attributes['session'] = ($value);
    }

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

    public function getCourseIdAttribute($value){
        return ($value);
    }
    public function setCourseIdAttribute($value){
        return $this->attributes['course_id'] = ($value);
    }

    public function getUserIdAttribute($value){
        return ($value);
    }
    public function setUserIdAttribute($value){
        return $this->attributes['user_id'] = ($value);
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

    public function course(){
        return $this->belongsTo('App\Courses', 'course_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
