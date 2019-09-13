<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{Courses};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CourseRepository;
use Illuminate\Support\Facades\Gate;
class CourseController extends Controller
{
    protected $model;
    public function __construct(Courses $course)
    {
       // set the model
       $this->model = new CourseRepository($course);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->email;
        if (auth()->user()->hasRole('Student')){
            $course =Courses::orderBy('course_title', 'asc')->get();
        }elseif(auth()->user()->hasRole('Staff')){
            $course =Courses::orderBy('course_title', 'asc')->get();
        }else{
            $course =Courses::orderBy('course_title', 'asc')->get();
        }
        return view('administrator.courses.create')->with([
            'course' => $course,
        ]);
    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore Course') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $course= Courses::onlyTrashed()->get();
            return view('administrator.courses.recyclebin')->with([
                'course' => $course,
            ]);
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To The Bin");
        }
    }

    public function restore($course_id)
    {
        if (auth()->user()->hasPermissionTo('Restore Course') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $cour = Courses::where("course_id", $course_id)->first();
            
            
            Courses::withTrashed()
            ->where('course_id', $course_id)
            ->restore();
            $categ= $this->model->show($course_id);
            $name = $categ->course_title;
            $code = $categ->course_code;
            
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'course_title' => $name,
                    'course_code' => $code,
                ])
            ->log('restored');
            return redirect()->back()->with([
                'success' => " You Have Restored". " ".$name. " " ." Details Successfully",
                
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
        if (auth()->user()->hasPermissionTo('Add Course') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'course_title' => 'required|min:1|max:255',
                'course_code' => 'required|min:1|max:255|unique:courses',
                'course_unit' => 'required|min:1|max:255',
                'course_status' => 'required|min:1|max:255',
                'course_file' => 'file|required|mimes:pdf,PDF,doc,DOC,docs,DOCS,ppt,PPT,docx,DOCX,pptx,PPTX,mp3,mp4,avi,AVI, mkv, MKV|max:4999',
            ]);

            if(Courses::where("course_code", $request->input("course_code"))->exists()){
                return redirect()->back()->with("error", $request->input("course_code"). "Already Exist on the list of Courses");
            }

            if($request->hasFile('course_file')){
                //Getting File Name With Extension
                $filenameWithExt = $request->file('course_file')->getClientOriginalName();
                // Get Just File Name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('course_file')->getClientOriginalExtension();
                // file name to store
                $cut = str_replace(" ", "_", $filename);
                $cutting = str_replace("-", "_", $cut);
                $fileNameToStore = $cutting.time().'.'.$extension;
                //upload the image
                $path=$request->file('course_file')->move('course-materials', $fileNameToStore);
            }else{
                $fileNameToStore = 'No File';
            }
            $data = [
                'course' => new Courses,
                "course_title" => $request->input('course_title'),
                "course_file" =>  $fileNameToStore,
                "course_unit" => $request->input('course_unit'),
                "course_code" => $request->input('course_code'),
                "course_status" => $request->input('course_status'),
            ];
            
            if($this->model->create($data)){
                return redirect()->route("course.create")->with(
                    "success", "You Have Added The Course Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Create A Course",
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
    public function edit($course_code)
    {
        if (auth()->user()->hasPermissionTo('Edit Course') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $course =Courses::orderBy('course_title', 'asc')->get();
            $cour = Courses::where("course_code", $course_code)->first();
            
            return view('administrator.courses.edit')->with([
                'course' => $course,
                'cour' => $cour,
            ]);
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Edit A Course",
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
    public function update(Request $request, $course_code)
    {
        if (auth()->user()->hasPermissionTo('Update Course') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'course_title' => 'required|min:1|max:255',
                'course_code' => 'required|min:1|max:255',
                'course_unit' => 'required|min:1|max:255',
                'course_status' => 'required|min:1|max:255',
                'course_file' => 'file|mimes:pdf,PDF,doc,DOC,docs,DOCS,ppt,PPT,docx,DOCX,pptx,PPTX,mp3,mp4,avi,AVI, mkv, MKV|max:4999',
            ]);
            $cour = Courses::where("course_code", $course_code)->first();
            $course_id = $cour->course_id;
#
            if($request->hasFile('course_file')){
                //Getting File Name With Extension
                $filenameWithExt = $request->file('course_file')->getClientOriginalName();
                // Get Just File Name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('course_file')->getClientOriginalExtension();
                // file name to store
                $cut = str_replace(" ", "_", $filename);
                $cutting = str_replace("-", "_", $cut);
                $fileNameToStore = $cutting.time().'.'.$extension;
                //upload the image
                $path=$request->file('course_file')->move('course-materials', $fileNameToStore);
            }
            $eve =  $this->model->show($course_id);
            if(empty($request->hasFile('course_file'))){
                $fileNameToStore = $eve->course_file;
            }
            $data = [
                'course' =>$this->model->show($course_id),
                "course_title" => $request->input('course_title'),
                "course_file" =>  $fileNameToStore,
                "course_unit" => $request->input('course_unit'),
                "course_code" => $request->input('course_code'),
                "course_status" => $request->input('course_status'),
            ];
            
            if($this->model->update($data, $course_id)){
                return redirect()->route("course.create")->with(
                    "success", "You Have Updated The Course Details Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Update A Course",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_code)
    {
        if(auth()->user()->hasPermissionTo('Delete Course') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $cour = Courses::where("course_code", $course_code)->first();
            $course_id = $cour->course_id;
            $course =  $this->model->show($course_id); 
            $details= $course->course_title;  
        
            if (($course->delete($course_id))AND ($course->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The course List Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Course",
            ]);
        }
    }
}
