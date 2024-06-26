<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\BannerImage;
use Hash;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $logedInAdmin = Auth::guard('admin')->user();
        if($logedInAdmin->admin_type >= 3){
            $admins = Admin::orderBy('id','asc')->get();
            $defaultProfile = BannerImage::whereId('15')->first();
            return view('admin.admin', compact('admins','defaultProfile'));
        }else return abort(404);

    }

    public function create(){
        $logedInAdmin = Auth::guard('admin')->user();
        $adminRole = AdminRole::where('id', '!=', 4)->get();
        if($logedInAdmin->admin_type >= 3){
            return view('admin.create_admin', compact('adminRole'));
        }else return abort(404);


    }

    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required|min:4',
        ];

        $customMessages = [
            'name.required' => trans('admin_validation.Name is required'),
            'email.required' => trans('admin_validation.Email is required'),
            'email.unique' => trans('admin_validation.Email already exist'),
            'password.required' => trans('admin_validation.Password is required'),
            'password.min' => trans('admin_validation.Password Must be 4 characters'),
        ];
        $this->validate($request, $rules,$customMessages);

        $admin = new Admin();
        $admin->name =$request->name;
        $admin->email =$request->email;
        $admin->status =$request->status;
        $admin->admin_type =$request->admin_type;
        $admin->password =Hash::make($request->status);
        $admin->save();

        $notification = trans('admin_validation.Create Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }


    public function destroy($id){
        $admin = Admin::find($id);
        $old_image = $admin->image;
        $admin->delete();
        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }
        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function changeStatus($id){
        $admin = Admin::find($id);
        if($admin->status == 1){
            $admin->status = 0;
            $admin->save();
            $message = trans('admin_validation.Inactive Successfully');
        }else{
            $admin->status = 1;
            $admin->save();
            $message = trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }
}
