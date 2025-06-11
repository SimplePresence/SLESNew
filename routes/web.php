<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@authenticate')->name('login_store');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard/data', 'HomeController@fetchDashboardData')->name('psx.dashboard.data');

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

//Password reset routes for admin
Route::post('/admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

// create in
Route::get('/home/in', 'HomeController@input_in')->name('home.in');
Route::get('/home/in/datatables', 'HomeController@input_in_datatables')->name('home.in.datatables');
Route::get('/home/in/get/supplier', 'HomeController@GetSupplierList')->name('home.in.get.supplier');
Route::delete('/home/in/delete/{id}', 'HomeController@input_in_deleted')->name('home.in.delete');
Route::get('/home/in/view/{id}', 'HomeController@input_in_view')->name('home.in.view');
Route::post('/home/in/add/po', 'HomeController@input_in_add_po')->name('home.in.add.po');
Route::post('/home/in/add/nonpo', 'HomeController@input_in_add_non_po')->name('home.in.add.non.po');

//Docking
Route::get('/home/docking', 'HomeController@input_docking')->name('home.docking');
Route::get('/home/docking/data', 'HomeController@getDockingData')->name('docking.data');
Route::post('/home/docking/assign', 'HomeController@assignDocking')->name('docking.assign');
Route::get('/home/docking/inprocess', 'HomeController@getInprocessDockingData');

//Check data SJ
Route::get('/home/checksj', 'DataSJ@dataSjIndex')->name('home.datasj');
Route::get('/home/get-data-sj', 'DataSJ@getDataSj')->name('home.getdatasj');
Route::get('/checksj/view/{id}', 'DataSJ@CheckSjView')->name('checksj.view');
Route::post('/checksj/ready/{id}/delivery', 'DataSJ@CheckSjReadyDelivery')->name('checksj.ready.delivery');

//milkrun
Route::get('/home/milkrun', 'MilkrunController@milkrunIndex')->name('home.milkrun');
Route::get('/get-suppliers', 'MilkrunController@getSuppliers')->name('get.suppliers');
Route::post('/kosong/save', 'MilkrunController@saveKosong')->name('kosong.save');


// create Out
Route::get('/home/out', 'HomeController@input_out')->name('home.out');
Route::get('/home/out/datatables', 'HomeController@input_out_datatables')->name('home.out.datatables');
Route::post('/home/out/add/material', 'HomeController@out_add_material')->name('home.out.add.material');
Route::post('/home/out/add/rakbox', 'HomeController@out_add_rakbox')->name('home.out.add.rakbox');
Route::get('/home/out/{id}/kosong', 'HomeController@out_add_kosong')->name('home.out.kosong');

// view in out
Route::get('/home/view', 'HomeController@view_data')->name('home.view');
Route::get('/home/view/view', 'HomeController@view_datatable')->name('home.view.view');
Route::get('/home/view/filter/{id}', 'HomeController@view_datatable_filter')->name('home.view.filter');
Route::delete('/home/view/delete/{id}', 'HomeController@view_delete')->name('home.view.delete');
Route::get('/home/view/edit/material/{id}', 'HomeController@view_edit_material')->name('home.view.edit.material');
Route::post('/home/view/edit/material/submit/', 'HomeController@view_edit_material_submit')->name('home.view.edit.material.submit');
Route::get('/home/view/printExcel/{id}', 'HomeController@view_printExcel')->name('home.view.printExcel');
Route::get('/home/view/printExcel/save/{id}', 'HomeController@printExcel')->name('home.view.printExcel.save');
Route::get('/home/view/view/modal/{id}', 'HomeController@view_viewAll')->name('home.view.view.all');

// master data
Route::get('master/view', 'MasterDataController@view_data')->name('master.index');
Route::get('/master/view/view', 'MasterDataController@view_datatable')->name('master.index.datatable');
Route::post('/master/create', 'MasterDataController@addDAtaUser')->name('master.addUser');
Route::delete('/master/destroy/{id}', 'MasterDataController@deleteDAtaUser')->name('master.deleteUser');
Route::get('/master/edit/{id}', 'MasterDataController@editDataUser')->name('master.editUser');
Route::put('/master/edit/update/{id}', 'MasterDataController@updateDataUser')->name('master.updateUser');

Route::get('/home/psx_report/{from_date}/{to_date}/excel', 'HomeController@printExcel');

