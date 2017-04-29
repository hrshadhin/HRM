<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;

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
		if (auth()->attempt(['email'=> $email, 'password'=> $password],$remember)) {
			session(['name' => auth()->user()->name]);
			return redirect()->intended('dashboard');
		} else {
			return back()->with('error', 'Your email/password combination was incorrect');

		}



	}

	public function logout()
	{
		Auth::logout();
		return redirect()->route('user.login')->with('success', 'Your are now logged out!');
	}

	/**
	* Show all user.
	*
	* @return Response
	*/
	public function index()
	{
		return $users = User::all();
		//return view('user.index',compact('users'));
	}

	public function lock(){
		return view('lock');
	}
	public function profile(){
		return view('profile');
	}
}
