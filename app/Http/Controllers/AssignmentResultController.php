<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{Courses, CourseAllocations, User, Staffs, Assignments, Students, AssignmentResults};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AssignmentResultRepository;
use Illuminate\Support\Facades\Gate;

class AssignmentResultController extends Controller
{
    protected $model;
    public function __construct(AssignmentResults $result)
    {
       // set the model
       $this->model = new AssignmentResultRepository($result);
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
            $results =AssignmentResults::where([
                'student_id' => $student_id,
            ])->orderBy('created_at', 'desc')->get();
            if(count($results) ==0){
                return redirect()->back()->with("error", "No Result is Found for You");
            }else{
                return view('administrator.results.index')->with([
                    'results'=> $results,
                    'student' => $student,
                ]);
            }

        }elseif(auth()->user()->hasRole('Staff')){
            $staff = User::where('email',  Auth::user()->email)->first();
            $user_id = $staff->user_id;
            $results =AssignmentResults::where([
                'user_id' => $user_id,
            ])->orderBy('created_at', 'desc')->get();
            return view('administrator.results.index')->with([
                'staff'=> $staff,
                'results'=> $results,
            ]);

        }else{
            $results = AssignmentResults::orderBy('created_at', 'desc')->get();
            if(count($results) ==0){
                return redirect()->back()->with("error", "No Result is Found");
            }else{
                return view('administrator.results.index')->with([
                    'results'=> $results,
                ]);
            }



        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasRole('Staff')){
            // $this->validate($request, [

            //     'assignment_id' => 'required||min:1|max:255',
            //     'solution_id' => 'required|min:1|max:255',
            //     'student_id' => 'required|min:1|max:255'
            // ]);
            echo "YES";
            $y = $request->input("show");
            for($i = 1; $i <= $y; $i++){
                $add_result = $request->input("mark$i");

                if($add_result ==1){

                    $assignment_id = $request->input("assignment_id$i");
                    $solution_id = $request->input("solution_id$i");
                    $student_id = $request->input("student_id$i");
                    $score = $request->input("score$i");
                    $user_id = $request->input("user_id$i");



                    $data =([
                        "result" => new AssignmentResults,
                        "assignment_id" => $assignment_id,
                        "score" => $score,
                        "solution_id" => $solution_id,
                        "student_id" => $student_id,
                        "user_id" => $user_id,

                    ]);
                    if($this->model->create($data)){


                    }else{
                        return redirect()->back()->with("error", "Unable To Submit The Result at the moment, Please try Again Later");
                    }
                }

            }

            return redirect()->route("result.index")->with("success", "You Have Submitted The Result Successfully");




        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Submit Result",
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
