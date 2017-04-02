<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
class RegistrationController extends Controller
{
    public function register(){
    	return view('auth/registration');
    }

    public function registerUser(Request $request){
    	$credential=[
    		'email'=>$request->email,
    		'first_name'=>$request->firstname,
    		'last_name'=>$request->lastname,
    		'password'=>$request->password,
    	];
    	$user=Sentinel::registerAndActivate($credential);
    	$role=Sentinel::findRoleBySlug('member');
        $user->roles()->attach($role);
    	return redirect('login');
    }

    public function login(){
    	return view('auth/login');
    }

    public function doLogin(Request $request){

    	 if (Sentinel::authenticate($request->all())) {
            $role=Sentinel::getUser()->roles()->first()->slug;
      	 	if ($role=='admin') {
      	 		Session::flash('message','you are now logged in');
      	 		return redirect('admin');
      	 	}elseif ($role=='staff') {
      	 		Session::flash('message','you are now logged in');
      	 		return redirect('staff');
      	 	}
      	 	Session::flash('message','you are now logged in');
      	 	return redirect('/');
    	 }else{
      	 	Session::flash('message','Authenticaton failed');
      	 	return redirect('/login');
    	 }
    }

    public function logout(){
    	Sentinel::logout();
    	return redirect('/login');
    }
}
