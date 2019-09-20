<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{Courses, Coursesolutions, User, Staffs, Assignments, Students, AssignmentSolutions};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AssignmentSolutionRepository;
use Illuminate\Support\Facades\Gate;

class AssignmentSolutionController extends Controller
{
    protected $model;
    public function __construct(AssignmentSolutions $solution)
    {
       // set the model
       $this->model = new AssignmentSolutionRepository($solution);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasRole('Student')){
            $student = Students::where('student_email',  Auth::user()->email)->first();
            $student_id = $student->student_id;
            $solution = AssignmentSolutions::where(
                [
                    'student_id' => $student_id,
                    'status' => 0,
            ])->orderBy('solution_id', 'desc')->get();
            return view('administrator.submissions.index')->with([
                'solution'=> $solution,

            ]);
        }elseif(auth()->user()->hasRole('Staff')){
            $staff = User::where('email',  Auth::user()->email)->first();
            $staff_id = $staff->user_id;
            $solution =AssignmentSolutions::where([
                'user_id' => $staff_id,
                'status' => 0,
            ])->orderBy('solution_id', 'desc')->get();
            return view('administrator.submissions.index')->with([
                'solution'=> $solution,
                // 'student' => $student,
            ]);
        }else{
            $solution =  AssignmentSolutions::where(
                [

                'status' => 0,
            ])->orderBy('solution_id', 'desc')->get();
            return view('administrator.submissions.index')->with([
                'solution'=> $solution,
                // 'student' => $student,
            ]);
        }
    }

    public function marked()
    {
        if (auth()->user()->hasRole('Student')){
            $student = Students::where('student_email',  Auth::user()->email)->first();
            $student_id = $student->student_id;
            $solution = AssignmentSolutions::where([
                'student_id' => $student_id,
                'status' => 1,
            ])->orderBy('solution_id', 'desc')->get();
            return view('administrator.submissions.marked')->with([
                'solution'=> $solution,

            ]);
        }elseif(auth()->user()->hasRole('Staff')){
            $staff = User::where('email',  Auth::user()->email)->first();
            $staff_id = $staff->user_id;
            $solution =AssignmentSolutions::where([
                'user_id' => $staff_id,
                'status' => 1,
            ])->orderBy('solution_id', 'desc')->get();
            return view('administrator.submissions.marked')->with([
                'solution'=> $solution,
                // 'student' => $student,
            ]);
        }else{
            $solution = AssignmentSolutions::orderBy('solution_id', 'desc')->get();
            return view('administrator.submissions.marked')->with([
                'solution'=> $solution,
                // 'student' => $student,
            ]);
        }
    }

    public function list()
    {
        if (auth()->user()->hasRole('Student')){
            $student = Students::where('student_email',  Auth::user()->email)->first();
            $student_id = $student->student_id;
            $solution = AssignmentSolutions::where([
                'student_id' => $student_id,

            ])->orderBy('solution_id', 'desc')->get();
            return view('administrator.submissions.list')->with([
                'solution'=> $solution,

            ]);
        }elseif(auth()->user()->hasRole('Staff')){
            $staff = User::where('email',  Auth::user()->email)->first();
            $staff_id = $staff->user_id;
            $solution =AssignmentSolutions::where([
                'user_id' => $staff_id,

            ])->orderBy('solution_id', 'desc')->get();
            return view('administrator.submissions.list')->with([
                'solution'=> $solution,
                // 'student' => $student,
            ]);
        }else{
            $solution = AssignmentSolutions::orderBy('solution_id', 'desc')->get();
            return view('administrator.submissions.list')->with([
                'solution'=> $solution,
                // 'student' => $student,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($assignment_id)
    {
        if (auth()->user()->hasRole('Student')){

            $student = Students::where('student_email',  Auth::user()->email)->first();
            $program = $student->program;
            $level = $student->level;
            $solution =Assignments::where([
                'level' => $level,
                'program' => $program,
                'assignment_id' => $assignment_id,

            ])->orderBy('created_at', 'desc')->first();

                return view('administrator.assignments.solution')->with([
                    'solution'=> $solution,
                    'student' => $student,
            ]);
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To Submit Assignment");
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (auth()->user()->hasRole('Student')){
            $this->validate($request, [
                'assignment_id' => 'min:1|max:255|',
                'solution' => 'required||min:1|max:255',
            ]);
            $student = Students::where('student_email',  Auth::user()->email)->first();
            $student_id = $student->student_id;

            $assignment_id = $request->input("assignment_id");
            $solution = $request->input("solution_id");

            $course_code = $request->input("course_code");
            $course_id = $request->input("course_id");
            $staff_id = $request->input("staff_id");

            if(AssignmentSolutions::where([
                "assignment_id" => $assignment_id,
               // "solution" => $solution,
                "student_id" => $student_id]

                )->exists()){
                    return redirect()->route("assignment.index")->with("error", "You Have Subnitted Your Solution for $course_code Before ");
            }else{
                $data =([
                    "staff" => new AssignmentSolutions,
                    "assignment_id" => $request->input("assignment_id"),
                    "solution" => $request->input("solution"),
                    "student_id" => $student_id,
                    "user_id" => $staff_id,
                    "status" => 0,
                ]);

            }

            if($this->model->create($data)){

                return redirect()->route("submissions.index")->with("success", "You Have Submitted Your Assignment for $course_code Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Submit An Assignment",
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
