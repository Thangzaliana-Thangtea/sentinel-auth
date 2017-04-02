<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Session;
use Sentinel;

class NoteController extends Controller
{
	public function index(){
		$notes=Note::all();
		return view('note.index',compact('notes'));
	}

    public function create(Request $request){
			$user=Sentinel::check();
			if ($user && $user->hasAccess("note.create")) {
					$note =new Note;
				 $note->content=$request->content;
				 $note->save();
				 $notes=Note::all();
				 Session::flash('message','Note Succesfully created ');
				 return back();
			}else{
				Session::flash('message','unauthorized access');
				  return back();
			}
    }

    public function edit(){
    	return view('note.edit');
    }

    public function update(Note $note){

    }

    public function delete( $id ){
			 $user=Sentinel::check();
			 if ($user && $user->hasAccess("note.delete")) {
			 	   Note::find($id)->delete();
					 Session::flash('message','Note Succesfully deleted ');
			 }else{
				   Session::flash('message','permission denied ');
			 }
			 return back();
    }
		public function forwardToNextRole(Request $request){
      $roleSlug=Sentinel::getUser()->roles()->first()->slug;
      switch ($roleSlug) {
        case 'member':
          $this->disablePermission('member');
          $this->enablePermission('clerk');
          Session::flash('permission','clerk access is granted');
          break;
        case 'clerk':
          $this->disablePermission('clerk');
          $this->enablePermission('staff');
          Session::flash('permission','staff access is granted');
          break;
        case 'staff':
          $this->disablePermission('staff');
          $this->enablePermission('admin');
          Session::flash('permission','admin access is granted');
          break;
        case 'admin':
          //admin logic would goes here
          break;
        default:

          break;
      }
      return back();

    }
    private function disablePermission($roleName){
      $role=Sentinel::findRoleBySlug($roleName);
          $role->updatePermission('note.create',false);
          $role->updatePermission('note.update',false);
          $role->updatePermission('note.delete',false);
          $role->save();
    }
    private function enablePermission($roleName){
       $role=Sentinel::findRoleBySlug($roleName);
       $role->updatePermission('note.create',true);
       $role->updatePermission('note.update',true);
        $role->updatePermission('note.delete',true);
        $role->save();
    }
}
