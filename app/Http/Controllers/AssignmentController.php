<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{Courses, CourseAllocations, User, Staffs, Assignments, Students};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AssignmentRepository;
use Illuminate\Support\Facades\Gate;
class AssignmentController extends Controller
{
    protected $model;
    public function __construct(Assignments $assignment)
    {
       // set the model
       $this->model = new AssignmentRepository($assignment);
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
            $program = $student->program;
            $level = $student->level;
            $allocation =Assignments::where([
                'level' => $level,
                'program' => $program,

            ])->orderBy('created_at', 'desc')->get();
            if(count($allocation) ==0){
                return redirect()->back()->with("error", "No Assignment is Found for Your Level and Program");
            }else{
                return view('administrator.assignments.index')->with([
                    'allocation'=> $allocation,
                    'student' => $student,
                ]);
            }

        }elseif(auth()->user()->hasRole('Staff')){
            $staff = Staffs::where('staff_email',  Auth::user()->email)->first();
            $staff_id = $staff->staff_id;
            $allocation =Assignments::where('user_id',  Auth::user()->user_id)->orderBy('created_at', 'desc')->get();
            //$assignment =Assignments::where('allocation_id',  $assignment->allocation_id)->first();
            return view('administrator.assignments.index')->with([
                'allocation'=> $allocation,
                //'assignment' => $assignment,
            ]);

        }else{
            $allocation =Assignments::orderBy('created_at', 'desc')->get();
            return view('administrator.assignments.index')->with([
                'allocation'=> $allocation,
            ]);

        }
    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore Assignment')){
            $allocation= Assignments::where('user_id', auth()->user()->user_id)->onlyTrashed()->get();
            return view('administrator.assignments.recyclebin')->with([
                'allocation' => $allocation,
            ]);
        }elseif (Gate::allows('Administrator', auth()->user())){
            $allocation= Assignments::onlyTrashed()->get();
            return view('administrator.assignments.recyclebin')->with([
                'allocation' => $allocation,
            ]);

        }else{
            return redirect()->back()->with("error", "You Dont Have Access To The Bin");
        }
    }

    public function restore($assignment_id)
    {
        if (auth()->user()->hasPermissionTo('Restore Assignment') OR
            (Gate::allows('Administrator', auth()->user()))){
            $cour = Assignments::where("assignment_id", $assignment_id)->first();


            Assignments::withTrashed()
            ->where('assignment_id', $assignment_id)
            ->restore();
            $categ= $this->model->show($assignment_id);

            return redirect()->back()->with([
                'success' => " You Have Restored The Assignment Details Successfully",

            ]);

        }else{
            return redirect()->back()->with("error", "You Dont Have Access To Restore From The Bin");
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($allocation_id)
    {
        $assignment = CourseAllocations::where('allocation_id', $allocation_id)->first();
        return view('administrator.assignments.create')->with([
            'assignment'=> $assignment,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasPermissionTo('Add Assignment') OR
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'allocation_id' => 'required|min:1|max:255|',
                'marks' => 'required||min:1|max:255',
                'question' => 'required|min:1|max:255',
                'submission_date' => 'required|min:1|max:255'
            ]);

            $course_code = $request->input("course_code");
            $course_id = $request->input("course_id");

            $data =([
                "staff" => new Assignments,
                "allocation_id" => $request->input("allocation_id"),
                "marks" => $request->input("marks"),
                "question" => ($request->input("question")),
                "submission_date" => $request->input("submission_date"),
                "user_id" => ($request->input("user_id")),
                "level" => $request->input("level"),
                "program" => ($request->input("program")),
                "course_id" => $request->input("course_id"),
            ]);

            if($this->model->create($data)){

                return redirect()->route("assignment.index")->with("success", "You Have Added The Assignment for $course_code Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create An Assignment",
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
    public function edit($assignment_id)
    {
        if (auth()->user()->hasPermissionTo('Edit Assignment')){
            $staff = Staffs::where('staff_email',  Auth::user()->email)->first();
            $staff_id = $staff->staff_id;
            $assignment =$this->model->show($assignment_id);
            $allocation =CourseAllocations::where('allocation_id',  $assignment->allocation_id)->first();
            return view('administrator.assignments.edit')->with([
                'assignment'=> $assignment,
                'allocation' =>$allocation,
            ]);
        }elseif(Gate::allows('Administrator', auth()->user())){
            $assignment =$this->model->show($assignment_id);
            $allocation =CourseAllocations::where('allocation_id',  $assignment->allocation_id)->first();
            return view('administrator.assignments.edit')->with([
                'assignment'=> $assignment,
                'allocation' =>$allocation,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit An Assignment",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $assignment_id)
    {
        if (auth()->user()->hasPermissionTo('Update Assignment') OR
            (Gate::allows('Administrator', auth()->user()))){
                $this->validate($request, [
                    'allocation_id' => 'required|min:1|max:255|',
                    'marks' => 'required||min:1|max:255',
                    'question' => 'required|min:1|max:255',
                    'submission_date' => 'required|min:1|max:255'
                ]);

                // $assignment =$this->model->show($assignment_id);

                $course_code = $request->input("course_code");

                $data =([
                    "assignment" => $this->model->show($assignment_id),
                    "allocation_id" => $request->input("allocation_id"),
                    "marks" => $request->input("marks"),
                    "question" => ($request->input("question")),
                    "submission_date" => $request->input("submission_date"),
                    "user_id" => ($request->input("user_id")),
                    "level" => $request->input("level"),
                    "program" => ($request->input("program")),
                    "course_id" => $request->input("course_id"),
                ]);

                if($this->model->update($data, $assignment_id)){

                    return redirect()->route("assignment.index")->with("success", "You Have Updated The Assignment Successfully");
                }else{
                    return redirect()->back()->with("error", "Network Failure");
                }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update An Assignment",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($assignment_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Assignment') OR
            (Gate::allows('Administrator', auth()->user()))){
            $cour = Assignments::where("assignment_id", $assignment_id)->first();
            $course_id = $cour->course_id;
            $course =  $this->model->show($assignment_id);
            $allocation =CourseAllocations::where('course_id',  $course->course_id)->first();
            $details= $allocation->course_title;

            if (($course->delete($course_id))AND ($course->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The Assignment List Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete An Assignment",
            ]);
        }
    }
}
