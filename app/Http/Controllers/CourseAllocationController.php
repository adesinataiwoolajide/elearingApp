<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{Courses, CourseAllocations, User, Staffs, Students};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CourseAllocationRepository;
use Illuminate\Support\Facades\Gate;
class CourseAllocationController extends Controller
{
    protected $model;
    public function __construct(CourseAllocations $allocation)
    {
       // set the model
       $this->model = new CourseAllocationRepository($allocation);
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
            $allocation =CourseAllocations::where([
                'level' => $level,
                'program' => $program,

            ])->orderBy('created_at', 'desc')->get();
            return view('administrator.course_allocation.create')->with([

                'allocation'=> $allocation,
                'student' => $student,
            ]);
        }elseif(auth()->user()->hasRole('Staff')){
            $staff = Staffs::where('staff_email',  Auth::user()->email)->first();
            $staff_id = $staff->staff_id;
            $allocation =CourseAllocations::where('user_id',  Auth::user()->user_id)->orderBy('created_at', 'desc')->get();
            return view('administrator.course_allocation.create')->with([
                'allocation'=> $allocation,
            ]);
        }else{
            $course =Courses::orderBy('course_title', 'asc')->get();
            $allocation =CourseAllocations::orderBy('created_at', 'desc')->get();
            $user =User::where('role', 'Staff')->orderBy('name', 'asc')->get();
            return view('administrator.course_allocation.create')->with([
                'course' => $course,
                'allocation'=> $allocation,
                'user' => $user,
            ]);
        }

    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore Course') OR
            (Gate::allows('Administrator', auth()->user()))){
            $allocation= CourseAllocations::onlyTrashed()->get();
            return view('administrator.course_allocation.recyclebin')->with([
                'allocation' => $allocation,
            ]);
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To The Bin");
        }
    }

    public function restore($allocation_id)
    {
        if (auth()->user()->hasPermissionTo('Restore Course') OR
            (Gate::allows('Administrator', auth()->user()))){
            $allocation = CourseAllocations::where("allocation_id", $allocation_id)->first();


            CourseAllocations::withTrashed()
            ->where('allocation_id', $allocation_id)
            ->restore();
            $categ= $this->model->show($allocation_id);
            $course_id = $categ->course_id;
            $user_id = $categ->user_id;
            $program = $categ->program;
            $level = $categ->level;

            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'course_id' => $course_id,
                    'user_id' => $user_id,
                    'program' => $program,
                    'level' => $level,
                ])
            ->log('restored');
            return redirect()->back()->with([
                'success' => " You Have Restored The Allocated Coursess Successfully",

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasPermissionTo('Allocate Course') OR
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'course_id' => 'required|min:1|max:255',
                'user_id' => 'required|min:1|max:255|',
                'program' => 'required|min:1|max:255',
                'level' => 'required|min:1|max:255',
                'session' => 'required|min:1|max:255',

            ]);

            $cour = Courses::where("course_id", $request->input('course_id'))->first();
            $user = User::where("user_id", $request->input('user_id'))->first();
            $name = $user->name;
            $course_code = $cour->course_code;

            if(CourseAllocations::where([
                "course_id" => $request->input("course_id"),
                "user_id" => $request->input("user_id"),
                "program" => $request->input("program"),
                "level" => $request->input("level"),
                "session" => $request->input("session")
                ]

                )->exists()){
                return redirect()->back()->with("error", "You Have Allocated $course_code to $name Before ");
            }


            $data = [
                'allocation' => new CourseAllocations,
                "course_id" => $request->input('course_id'),
                "user_id" =>  $request->input('user_id'),
                "program" => $request->input('program'),
                "level" => $request->input('level'),
                "session" => $request->input("session")

            ];

            if($this->model->create($data)){
                return redirect()->route("allocation.create")->with(
                    "success", "You Have Allocated $course_code to $name Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            }
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Create Course Allocation",
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
    public function edit($allocation_id)
    {
        if (auth()->user()->hasPermissionTo('Edit Allocate Course') OR
            (Gate::allows('Administrator', auth()->user()))){
            $allo = $this->model->show($allocation_id);
            $allocation =CourseAllocations::orderBy('created_at', 'asc')->get();
            $course =Courses::orderBy('course_title', 'asc')->get();
            $user =User::where('role', 'Staff')->orderBy('name', 'asc')->get();
            return view('administrator.course_allocation.edit')->with([
                'allocation' => $allocation,
                'allo' => $allo,
                'course' => $course,
                'user' => $user,
            ]);
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Edit A Course Allocation",
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
    public function update(Request $request, $allocation_id)
    {
        if (auth()->user()->hasPermissionTo('Update Allocate Course') OR
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'course_id' => 'required|min:1|max:255',
                'user_id' => 'required|min:1|max:255|',
                'program' => 'required|min:1|max:255',
                'level' => 'required|min:1|max:255',
                'session' => 'required|min:1|max:255',


            ]);

            $data = [
                'allocation' => $this->model->show($allocation_id),
                "course_id" => $request->input('course_id'),
                "user_id" =>  $request->input('user_id'),
                "program" => $request->input('program'),
                "level" => $request->input('level'),
                "session" => $request->input("session")

            ];

            if($this->model->update($data, $allocation_id)){
                return redirect()->route("allocation.create")->with(
                    "success", "You Have Updated The Course Allocation Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            }
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Update Course Allocation",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($allocation_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Allocate Course') OR
            (Gate::allows('Administrator', auth()->user()))){

            $course =  $this->model->show($allocation_id);
            $course_id= $course->course_id;
            $cour = Courses::where("course_id", $course_id)->first();

            $course_code = $cour->course_code;

            if (($course->delete($course_id))AND ($course->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted The Course Allocation Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Course Allocation",
            ]);
        }
    }
}
