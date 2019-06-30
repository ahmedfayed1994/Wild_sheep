<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;

class userController extends Controller
{

    public function user(){
        $users = User::all();
        return view('admin.page.users.user',compact('users'));
    }

    public function edituser($id){
        $editUser = User::find($id);
        return view('admin.page.users.edit',compact('editUser'));
    }

    public function update(Request $request, $id){
        $update = User::find($id);
        $update->first_name = $request->first_name;
        $update->last_name = $request->last_name;
        $update->phone = $request->phone;
        $update->password = bcrypt($request->phone);

        if (!empty($request->file('image'))){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $name = rand().time() . '.' .$ext;
            $image->move(public_path('/upload'),$name);
            $update->image = $name;
        }
        
        $update->update();
        Session::flash('alert-success', 'تم تعديل البيانات بنجاح');
        return redirect('user');
    }

    public function delete($id){
        $delete = User::find($id);
        $delete->delete();
        Session::flash('alert-success', 'تم حذف البيانات بنجاح');
        return redirect('user');
    }
}
