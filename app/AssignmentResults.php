<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class AssignmentResults extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'assignment_results';
    public $primaryKey = 'result_id';
    protected $guard_name = 'web';
    protected $fillable = [
        'assignment_id', 'student_id', 'solution_id', 'score', 'user_id'
    ];
    //protected static $logAttributes = ['assignment_id', 'student_id', 'solution_id', 'score'];

    public function getUserIdDateAttribute($value){
        return ($value);
    }
    public function setUserIdAttribute($value){
        return $this->attributes['user_id'] = ($value);
    }

    public function getScoreAttribute($value){
        return ($value);
    }
    public function setScoreAttribute($value){
        return $this->attributes['score'] = ($value);
    }
    public function getAssignmentIdAttribute($value){
        return ($value);
    }
    public function setAssignmentIdAttribute($value){
        return $this->attributes['assignment_id'] = ($value);
    }
    public function getStudentIdAttribute($value){
        return ($value);
    }
    public function setStudentIdAttribute($value){
        return $this->attributes['student_id'] = ($value);
    }
    public function getSolutionIdAttribute($value){
        return ($value);
    }
    public function setSolutionIdAttribute($value){
        return $this->attributes['solution_id'] = ($value);
    }

    public function assignmen(){
        return $this->belongsTo('App\Assignments','assignment_id');
    }
    public function learner(){
        return $this->belongsTo('App\Students','student_id');
    }

}
