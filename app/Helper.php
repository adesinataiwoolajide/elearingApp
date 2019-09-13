<?php
    function solution($assignment_id){
        return \DB::table('assignment_solutions')->where([
            "assignment_id" => $assignment_id
        ])->first();
    }


    function assignmentCourse($course_id){
        return \DB::table('course_assignments')->where([
            "course_id" => $course_id
        ])->first();
    }

    function seeCourse($course_id){
        return \DB::table('courses')->where([
            "course_id" => $course_id
        ])->get();
    }
?>
