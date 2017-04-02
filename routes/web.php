<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('register','RegistrationController@register');
Route::post('register','RegistrationController@registerUser');
Route::get('login','RegistrationController@login');
Route::post('login','RegistrationController@doLogin');
Route::post('logout','RegistrationController@logout');


Route::get('admin','AdminController@index')->middleware('admin');
Route::get('staff','StaffController@index')->middleware('staff');
Route::get('clerk','StaffController@index')->middleware('clerk');
Route::get('Member','MemberController@index')->middleware('member');

Route::post('note/create','NoteController@create')->middleware('member');
Route::get('note/edit','NoteController@edit');
Route::put('note/update','NoteController@update');
Route::delete('note/delete/{id}','NoteController@delete');
Route::get('note/','NoteController@index')->middleware('member');
Route::post('note/enablepermission','MemberController@enableNoteCreatedRole');
Route::post('note/disablePermission','MemberController@disableNoteCreatedPermission');
Route::put('note/forward','NoteController@forwardToNextRole');
