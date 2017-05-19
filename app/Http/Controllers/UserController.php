<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{


    public function login(){
        return view('login');
    }
    public function postLogin(Request $request)
    {
        //validate form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $remember=$request->has('remember');
        if (auth()->attempt(['email'=> $email, 'password'=> $password,'deleted_at' => null],$remember)) {
            session(['name' => auth()->user()->name]);
            $notification= array('title' => 'Login', 'body' => 'Hello '.auth()->user()->name.'!You are now logged in.');
            return redirect()->intended('dashboard')->with('success',$notification);
        } else {
            return back()->with('error', 'Your email/password combination was incorrect OR account disabled!');

        }



    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login')->with('success', 'Your are now logged out!');
    }


    public function create(){
        $roles = Role::select('name as id','name')->pluck('name','id');
        $permission = Permission::orderBy('name','asc')->get();
        return view('user.create',compact('roles','permission'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
        $data = $request->all();
        $data['users_id'] = auth()->user()->id;
        $user = User::create($data);
        $user->assignRole($request->get('role'));
        if($request->has('permission')){
            $permissions = $request->get('permission');
            $userPermissions = [];
            foreach ($permissions as $index => $value){
                $permission = [
                    'user_id' => $user->id,
                    'permission_id' => $value
                ];
                array_push($userPermissions,$permission);
            }
           DB::table('user_has_permissions')->insert($userPermissions);
        }

        $notification= array('title' => 'Data Store', 'body' => 'User created Successfully');
        return redirect()->route('user.index')->with('success',$notification);
    }
    /**
     * Show all user.
     *
     * @return Response
     */
    public function index()
    {
         $users = User::withTrashed()->with('entry')->get();
        return view('user.index',compact('users'));
    }

    public function destroy($id,Request $request)
    {
        $user = User::withTrashed()->findOrFail($id);
        if(trim($request->get('whatToDo')) == "Inactive"){
            $user->delete();

        }
        else{
            $user->restore();

        }

        $notification= array('title' => 'Data Remove', 'body' => 'User status updated Successfully');
        return redirect()->route('user.index')->with('success',$notification);
    }

    public function edit($id)
    {
        $roles = Role::select('name as id','name')->pluck('name','id');
        $permission = Permission::orderBy('name','asc')->get();

        $user = User::findOrFail($id);
        $userRole = '';
        if($user->hasRole('admin')){
            $userRole = 'admin';
        }
        if($user->hasRole('supervisor')){
            $userRole = 'supervisor';
        }
        if($user->hasRole('operator')){
            $userRole = 'operator';
        }
        return view('user.edit',compact('user','roles','userRole','permission'));
    }

    public function update(Request $request,$id){
        $user = User::findOrFail($id);
        if(!$request->has('isOnlyPasword') && \auth()->user()->hasRole('admin')) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email,'.$user->id,
                'role' => 'required',
            ]);

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            //$user->users_id = auth()->user()->id;

            if ($request->get('password') != '') {
                $user->password = $request->get('password');
            }
            $user->save();
            $user->syncRoles([$request->get('role')]);

            DB::table('user_has_permissions')->where('user_id', $user->id)->delete();

            if ($request->has('permission')) {
                $permissions = $request->get('permission');
                $userPermissions = [];
                foreach ($permissions as $index => $value) {
                    $permission = [
                        'user_id' => $user->id,
                        'permission_id' => $value
                    ];
                    array_push($userPermissions, $permission);
                }
                DB::table('user_has_permissions')->insert($userPermissions);
            }

            $notification = array('title' => 'Data Store', 'body' => 'User updated Successfully');
            return redirect()->route('user.index')->with('success', $notification);
        }
        else{
            $this->validate($request, [
                'password' => 'required|confirmed|min:6'
            ]);
////            echo bcrypt($request->get('oldpassword'));
////            echo '<br>'.auth()->user()->password;
////            die();
//
//            dd(Hash::check('demo123',$user->password));
//            if(!Hash::check($request->get('oldpassword'), auth()->user()->password)){
//                $notification= array('title' => 'Validation Error', 'body' => 'Old Password did not match!!!');
//                return Redirect::back()->with('error',$notification);
//            }
            $user->password = $request->get('password');
            $user->save();

            $notification= 'Password changed.';
            return redirect()->route('user.login')->with('success',$notification);
        }
    }

    public function lock(){
        $email = \auth()->user()->email;
        Auth::logout();
        return view('lock',compact('email'));
    }
    public function profile(){
        return view('profile');
    }
}
