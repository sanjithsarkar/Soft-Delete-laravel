<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{

    // Display a listing of the User

    public function ViewUserlist()
    {
        $users = User::with('role')->get();
        //dd($users->toArray());
        return view('user.index')->with('users', $users);
    }


    // Show the form for creating a new user

    public function CreateUser()
    {
        return view('user.create');
    }


    //Store a newly created user in storage

    public function InsertUser(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'usertype' => 'required',
        ]);


        $role = array();
        $role['view_role'] = $request->view_role;
        $role['create_role'] = $request->create_role;
        $role['edit_role'] = $request->edit_role;
        $role['delete_role'] = $request->delete_role;
        $role['view_product'] = $request->view_product;
        $role['create_product'] = $request->create_product;
        $role['edit_product'] = $request->edit_product;
        $role['delete_product'] = $request->delete_product;
        $role_id = DB::table('roles')->insertGetId($role);

        $data = new User();
        $data->role_id = $role_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->usertype = $request->usertype;
        $data->password = Hash::make($request->password);
        $data->save();


        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect(route('view.user'))->with($notification);
    }

    // Display the specified user

    public function ShowUser($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.show_user')->with('user', $user);
    }


    // Edit User

    public function EditUser($id)
    {
        $user = User::find($id);
        return view('user.edit_user')->with('user', $user);
    }

    // End Edit User


    // Update User

    public function UpdateUser(Request $request, $id)
    {
        $usertype = User::where('usertype', $request->usertype)->first();
        if ($usertype != '') {

            $data = User::where('id', $id)->first();
            $data->usertype = $request->usertype;
            $data->save();

            $role = Role::where('id', $data->role_id)->first();
            $role->view_role = $request->view_role;
            $role->create_role = $request->create_role;
            $role->edit_role = $request->edit_role;
            $role->delete_role = $request->delete_role;
            $role->view_product = $request->view_product;
            $role->create_product = $request->create_product;
            $role->edit_product = $request->edit_product;
            $role->delete_product = $request->delete_product;
            //dd($role);
            $role->save();

            $notification = array(
                'message' => 'User Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect(route('view.user'))->with($notification);
        } else {

            $data = User::where('id', $id)->first();
            //$data->usertype = $request->usertype;
            //$data->save();

            $role = Role::where('id', $data->role_id)->first();
            $role->view_role = $request->view_role;
            $role->create_role = $request->create_role;
            $role->edit_role = $request->edit_role;
            $role->delete_role = $request->delete_role;
            $role->view_product = $request->view_product;
            $role->create_product = $request->create_product;
            $role->edit_product = $request->edit_product;
            $role->delete_product = $request->delete_product;
            //dd($role);
            $role->save();

            $notification = array(
                'message' => 'User Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect(route('view.user'))->with($notification);
        }
    }


    // User Delete

    public function UserDelete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect(route('view.user'))->with($notification);
    }


    // User Logout Method

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    // End User Logout Method
}
