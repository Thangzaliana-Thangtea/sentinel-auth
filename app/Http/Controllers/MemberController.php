<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
class MemberController extends Controller
{
    public function index(){
    	return redirect('/');
    }

    public function enableNoteCreatedRole(Request $request){
       $user=Sentinel::check();
       if ($user && $user->hasAccess("note.create")==false) {
           $user->roles()->first()->updatePermission('note.create')->save();
       }
       Session::flash('message','allowed note created permission');
       return back();
    }

    public function disableNoteCreatedPermission(Request $request){
      $user=Sentinel::check();
      if ($user && $user->hasAccess('note.create')==true) {
          $user->roles()->first()->updatePermission('note.create',false)->save();
      }
      Session::flash('message','Denied note created permission');
      return back();
    }


}
