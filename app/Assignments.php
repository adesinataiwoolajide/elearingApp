<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class Assignments extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'course_assignments';
    public $primaryKey = 'assignment_id';
    protected $guard_name = 'web';
    protected $fillable = [
        'allocation_id', 'question', 'marks', 'submission_date', 'user_id', 'program', 'level', 'course_id'
    ];
    protected static $logAttributes = ['allocation_id', 'question', 'submission_date', 'user_id'];



    public function getCourseIdAttribute($value){
        return ($value);
    }
    public function setCourseIdAttribute($value){
        return $this->attributes['course_id'] = ($value);
    }
    public function getProgramAttribute($value){
        return ucwords($value);
    }
    public function setProgramAttribute($value){
        return $this->attributes['program'] = ucwords($value);
    }

    public function getSubmissionDateAttribute($value){
        return ($value);
    }
    public function setSubmissionDateAttribute($value){
        return $this->attributes['submission_date'] = ($value);
    }

    public function getUserIdDateAttribute($value){
        return ($value);
    }
    public function setUserIdAttribute($value){
        return $this->attributes['user_id'] = ($value);
    }

    public function getMarksAttribute($value){
        return ($value);
    }
    public function setMarksAttribute($value){
        return $this->attributes['marks'] = ($value);
    }

    public function getAllocationIdAttribute($value){
        return ($value);
    }
    public function setAllocationIdAttribute($value){
        return $this->attributes['allocation_id'] = ($value);
    }

    public function getQuestionAttribute($value){
        return ($value);
    }
    public function setQuestionAttribute($value){
        return $this->attributes['question'] = ($value);
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

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function course(){
        return $this->belongsTo('App\Courses', 'course_id');
    }

    public function solutions(){
        return $this->hasMany('App\AssignmentSolutions', 'solution_id', 'assignment_id');
    }
    public function results(){
        return $this->hasMany('App\AssignmentResultss', 'result', 'assignment_id');
    }

}
