<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
class AssignmentSolutions extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $table = 'assignment_solutions';
    public $primaryKey = 'solution_id';
    protected $guard_name = 'web';
    protected $fillable = [
        'assignment_id', 'student_id', 'solution'
    ];
    protected static $logAttributes = ['assignment_id', 'student_id', 'solution'];

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
    public function getSolutionAttribute($value){
        return ($value);
    }
    public function setSolutionAttribute($value){
        return $this->attributes['solution'] = ($value);
    }

    public function assignment(){
        return $this->hasMany('App\Assignments','assignment_id', 'course_id');
    }
    public function assignments(){
        return $this->belongsTo('App\Assignments','assignment_id');
    }

    public function student(){
        return $this->belongsTo('App\Students', 'student_id');
    }

}
