<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{User, Students};
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\StudentRepository;
use Illuminate\Support\Facades\Gate;
class StudentController extends Controller
{
    protected $model;
    public function __construct(Students $student)
    {
       // set the model
       $this->model = new StudentRepository($student);
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

        }elseif(auth()->user()->hasRole('Staff')){
            $student =$this->model->all();
        }elseif(Gate::allows('Administrator', auth()->user())){
            $student =$this->model->all();
        }else{

            return redirect()->back()->with([
                'error' => "You Dont have To Check The Student List",
            ]);
        }

        return view('administrator.students.create')->with([
            'student' => $student,
        ]);

    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore Student') OR
        (Gate::allows('Administrator', auth()->user()))){
            $student= Students::onlyTrashed()->get();
            return view('administrator.students.recyclebin')->with([
                'student' => $student,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To The Bin",
            ]);
        }
    }

    public function restore($student_email)
    {
        if (auth()->user()->hasPermissionTo('Restore Student') OR
            (Gate::allows('Administrator', auth()->user()))){

            if(Students::withTrashed()->where('student_email', $student_email)->restore() AND
                User::withTrashed()->where('email', $student_email)->restore()){
                return redirect()->back()->with([
                    'success' => " You Have Restored". " ".$student_email. " " ." Details Successfully",

                ]);
            }else{
                return redirect()->back()->with([
                    'error' => " Network Failure, Please Try Again Later",

                ]);
            }

        }else{
            return redirect()->back()->with("error", "You Dont Have Access To The Recycle Bin");
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
        if (auth()->user()->hasPermissionTo('Add Student') OR
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'file' =>'file|required',
            ]);

            $check =0;
            $filename=$_FILES["file"]["tmp_name"];
            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($filename, "r");
                while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
                    $new = $emapData;
                    $student_name = $emapData[0];
                    $student_email = $emapData[1];
                    $phone_number = $emapData[2];
                    $matric_number =$emapData[3];
                    $level = $emapData[4];
                    $program =$emapData[5];

                    if(User::where("email", $student_email)->exists() OR (Students::where("student_email", $student_email)->exists())){
                        return redirect()->back()->with("error", $student_email. "is In Use By Another Student");
                    }elseif(Students::where("matric_number", $matric_number)->exists()){
                        return redirect()->back()->with("error", $matric_number. "is In Use By Another Student");
                    }else{
                        $data = [
                            'student' => new Students,
                            "student_name" => $student_name,
                            "student_email" =>  $student_email,
                            "phone_number" => $phone_number,
                            "matric_number" => $matric_number,
                            "level" => $level,
                            "program" => $program,
                        ];

                        $use =new User ([
                            "email" => $student_email,
                            "name" => $student_name,
                            "password" => Hash::make($student_email),
                            "role" => 'Student',
                            "status" => 1,
                        ]);

                        if($this->model->create($data) AND($use->save()) AND($use->assignRole('Student'))){
                            $use->givePermissionTo([
                                'View Student', 'Edit Student', 'Update Student', 'View Allocate Course', 'View Course', 'View Staff',
                            ]);

                        }else{
                            return redirect()->back()->with("error", "Network Failure");
                        }
                    }
                }
                return redirect()->route("student.create")->with("success", "You Have Uploaded The Students Data Successfully");
            }


        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A Student",
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
    public function edit($matric_number)
    {
        if (auth()->user()->hasPermissionTo('Edit Student') OR
            (Gate::allows('Administrator', auth()->user()))){
            if (auth()->user()->hasRole('Student')){
                $student = Students::where('student_email',  Auth::user()->email)->first();
                $stu = Students::where("matric_number", $matric_number)->first();
                $student_email = $stu->student_email;
                $user = User::where("email", $student_email)->first();
            }elseif(auth()->user()->hasRole('Staff')){
                $student =Students::orderBy('matric_number', 'asc')->get();
                $stu = Students::where("matric_number", $matric_number)->first();
                $student_email = $stu->student_email;
                $user = User::where("email", $student_email)->first();
                return view('administrator.students.edit')->with([
                    'student' => $student,
                    'stu' => $stu,
                    'user' => $user,
                ]);
            }elseif(Gate::allows('Administrator', auth()->user())){
                $student =Students::orderBy('matric_number', 'asc')->get();
                $stu = Students::where("matric_number", $matric_number)->first();
                $student_email = $stu->student_email;
                $user = User::where("email", $student_email)->first();
                return view('administrator.students.edit')->with([
                    'student' => $student,
                    'stu' => $stu,
                    'user' => $user,
                ]);
            }else{

                return redirect()->back()->with([
                    'error' => "You Dont have To Edit The Student Details",
                ]);
            }


        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Edit A Student Data",
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
    public function update(Request $request, $id)
    {
        if (auth()->user()->hasPermissionTo('Update Student') OR
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'student_name' => 'required|min:1|max:255|',
                'student_email' => 'required||min:1|max:255',
                'phone_number' => 'required|min:1|max:255',
                'matric_number' => 'required|min:1|max:255',
                'level' => 'required|min:1|max:255',
                'program' => 'required|min:1|max:255'
            ]);

            $student_id = $request->input("student_id");
            $user_id= $request->input("user_id");
            $student = $this->model->show($student_id);
            $student_email = $student->student_email;
            $deed = User::where("user_id", $user_id)->first();


            $data = [
                'student' => $this->model->show($student_id),
                "student_name" => $request->input("student_name"),
                "student_email" =>  $request->input("student_email"),
                "phone_number" => $request->input("phone_number"),
                "matric_number" => $request->input("matric_number"),
                "level" => $request->input("level"),
                "program" => $request->input("program"),
            ];
            if(($this->model->update($data, $student_id))){
                DB::table('users')->where([
                    'user_id' =>$user_id,
                ])->update([
                    "email" => $request->input("student_email"),
                    "name" => $request->input("student_name"),
                    "password" => Hash::make($request->input("student_email")),
                    "role" => 'Student',
                    "status" => 1,
                ]);
                //DB::table('model_has_roles')->where('model_id',$user_id)->delete();
                return redirect()->route("student.create")->with("success", "You Have Updated The student
                Details Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            }

        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update A Student Data",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($matric_number)
    {
        if (auth()->user()->hasPermissionTo('Delete Student') OR
        (Gate::allows('Administrator', auth()->user()))){
            $stu = Students::where([
                "matric_number" => $matric_number,
            ])->first();
            $student =  $this->model->show($stu->student_id);
            $use = User::where([
                "email" => $student->student_email,
            ])->first();

            $user_id = $use->user_id;

            $details= $use->name;
            $email = $use->email;
            $roles = $use->role;

            if (($student->delete($stu->student_id)) AND ($student->trashed()) AND($use->delete($use->user_id))
                AND ($use->trashed())) {
                //$use->removeRole($roles);
                return redirect()->back()->with([
                    'success' => "You Have Deleted  $details From The Student Details Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Student",
            ]);
        }
    }
}
