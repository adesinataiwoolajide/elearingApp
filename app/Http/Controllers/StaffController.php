<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{User, Staffs};
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\StaffRepository;
use Illuminate\Support\Facades\Gate;

class StaffController extends Controller
{
    protected $model;
    public function __construct(Staffs $staff)
    {
       // set the model
       $this->model = new StaffRepository($staff);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('View Staff') OR
            (Gate::allows('Administrator', auth()->user()))){

                if (auth()->user()->hasRole('Student')){
                    $staff =$this->model->all();
                    return view('administrator.staffs.create')->with([
                        'staff' => $staff,
                    ]);
                }elseif(auth()->user()->hasRole('Staff')){
                    $sta = Staffs::where('staff_email',  Auth::user()->email)->first();
                    return view('administrator.staffs.create')->with([
                        'sta' => $sta,
                    ]);
                }else{
                    $staff =$this->model->all();
                    return view('administrator.staffs.create')->with([
                        'staff' => $staff,
                    ]);
                }


        } else{
            return redirect()->back()->with([
                'error' => "You Dont Access have To Check The Staff List",
            ]);
        }
    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore Staff') OR
        (Gate::allows('Administrator', auth()->user()))){
            $staff= Staffs::onlyTrashed()->get();
            return view('administrator.staffs.recyclebin')->with([
                'staff' => $staff,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To The Bin",
            ]);
        }
    }

    public function restore($staff_email)
    {
        if (auth()->user()->hasPermissionTo('Restore Staff') OR
            (Gate::allows('Administrator', auth()->user()))){

            if(Staffs::withTrashed()->where('staff_email', $staff_email)->restore() AND
                User::withTrashed()->where('email', $staff_email)->restore()){
                return redirect()->back()->with([
                    'success' => " You Have Restored". " ".$staff_email. " " ." Details Successfully",

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
        if (auth()->user()->hasPermissionTo('Add Staff') OR
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'staff_name' => 'required|min:1|max:255|',
                'staff_email' => 'required||min:1|max:255|unique:staffs',
                'phone_number' => 'required|min:1|max:255',
                'initial' => 'required|min:1|max:255'
            ]);

            if(User::where("email", $request->input("staff_email"))->exists() OR (Staffs::where("staff_email", $request->input("staff_email"))->exists())){
                return redirect()->back()->with("error", $request->input("staff_email"). "is In Use By Another Staff");

            }else{
                $use =new User ([
                    "email" => $request->input("staff_email"),
                    "name" => $request->input("staff_name"),
                    "password" => Hash::make($request->input("staff_email")),
                    "role" => 'Staff',
                    "status" => 1,
                ]);

                $data =([
                    "staff" => new Staffs,
                    "staff_email" => $request->input("staff_email"),
                    "staff_name" => $request->input("staff_name"),
                    "phone_number" => ($request->input("phone_number")),
                    "initial" => $request->input("initial"),


                ]);

                if($use->save() AND ($this->model->create($data))){
                    $addRoles = $use->assignRole('Staff');
                    $use->givePermissionTo([
                        'Edit Staff', 'Update Staff',  'View Staff',
                        'Add Course', 'Edit Course', 'Update Course',
                        'View Allocate Course','View Student',
                        'Add Assignment', 'Edit Assignment', 'Update Assignment',
                        'Delete Assignment', 'Restore Assignment'
                    ]);

                    return redirect()->route("staff.create")->with("success", "You Have Added Staff "
                    .$request->input("name"). " The Staff List Successfully");
                }else{
                    return redirect()->back()->with("error", "Network Failure");
                }
            }

        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A User",
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($staff_email)
    {
        if (auth()->user()->hasPermissionTo('Edit Staff') OR
            (Gate::allows('Administrator', auth()->user()))){
            if(auth()->user()->hasRole('Staff')){
                //$staff = Staffs::where('staff_email',  Auth::user()->email)->get();
                $sta = Staffs::where("staff_email", $staff_email)->first();
                $used = User::where("email", $staff_email)->first();
                $staff_id = $sta->staff_id;
                $use = $this->model->show($staff_id);

                return view('administrator.staffs.edit')->with([
                   // "staff" => $staff,
                    "use" =>$use,
                    "sta" => $sta,
                    "used" => $used,

                ]);
            }else{
                $staff =$this->model->all();
                $sta = Staffs::where("staff_email", $staff_email)->first();
                $used = User::where("email", $staff_email)->first();
                $staff_id = $sta->staff_id;
                $use = $this->model->show($staff_id);

                return view('administrator.staffs.edit')->with([
                    "staff" => $staff,
                    "use" =>$use,
                    "sta" => $sta,
                    "used" => $used,

                ]);
            }


        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Staff",
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
    public function update(Request $request, $staff_email)
    {
        if (auth()->user()->hasPermissionTo('Update Staff') OR
            (Gate::allows('Administrator', auth()->user()))){
                $this->validate($request, [
                    'staff_name' => 'required|min:1|max:255|',
                    'staff_email' => 'required||min:1|max:255',
                    'phone_number' => 'required|min:1|max:255',
                    'initial' => 'required|min:1|max:255'
                ]);
            $staff_id = $request->input("staff_id");
            $user_id= $request->input("user_id");
            $staff = $this->model->show($staff_id);
            $staff_email = $staff->email;
            $deed = User::where("user_id", $user_id)->first();

            $password = $deed->password;

            $data =([
                "staff" => $this->model->show($staff_id),
                "staff_email" => $request->input("staff_email"),
                "staff_name" => $request->input("staff_name"),
                "phone_number" => $request->input("phone_number"),
                "initial" => $request->input("initial"),
            ]);

            if(($this->model->update($data, $staff_id))){
                DB::table('users')->where([
                    'user_id' =>$user_id,
                ])->update([
                    "email" => $request->input("staff_email"),
                    "name" => $request->input("staff_name"),
                    "password" => Hash::make($request->input("staff_email")),
                    "role" => 'Staff',
                    "status" => 1,
                ]);
               // DB::table('model_has_roles')->where('model_id',$user_id)->delete();
                $addRoles = $deed->assignRole('Staff');
                return redirect()->route("staff.create")->with("success", "You Have Updated The Staff
                Details Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update A Staff",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($staff_email)
    {
        if (auth()->user()->hasPermissionTo('Delete Staff') OR
        (Gate::allows('Administrator', auth()->user()))){
            $staf = Staffs::where([
                "staff_email" => $staff_email,
            ])->first();
            $staff =  $this->model->show($staf->staff_id);
            $use = User::where([
                "email" => $staff_email,
            ])->first();

            $user_id = $use->user_id;

            $details= $use->name;
            $email = $use->email;
            $roles = $use->role;

            if (($staff->delete($staf->staff_id)) AND ($staff->trashed()) AND($use->delete($use->user_id))
            AND ($use->trashed())) {
                //$use->removeRole($roles);
                return redirect()->back()->with([
                    'success' => "You Have Deleted  $details From The Staff Details Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Staff",
            ]);
        }
    }
}
