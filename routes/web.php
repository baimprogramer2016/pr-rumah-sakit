<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingIconController;
use App\Http\Controllers\SettingMenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\MasterInputController1;
use App\Http\Controllers\MasterInputController2;
use App\Http\Controllers\MasterInputController3;
use App\Http\Controllers\MasterInputController4;
use App\Http\Controllers\MasterInputController5;
use App\Http\Controllers\MasterInputController6;
use App\Http\Controllers\MasterInputController4Parameter;
use App\Http\Controllers\Others\Input1Controller;
use App\Http\Controllers\SettingKategoriController;
use App\Http\Controllers\SettingRoleController;
use App\Http\Controllers\PetunjukTeknisController;
use App\Http\Controllers\SettingStatusPerformanceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[LoginController::class,'index'])->name('login');
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware('auth');

Route::get('/error', [ErrorController::class,'index'])->name('error');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/auth',[LoginController::class,'authenticate'])->name('auth');
        
//ADMIN , ICON, MENU, ROLE , USER
Route::get('/setting-icon', [SettingIconController::class,'index'])->name('setting-icon')->middleware('auth');
Route::post('/setting-icon-process', [SettingIconController::class,'process'])->name('setting-icon-process')->middleware('auth');
Route::get('/setting-menu', [SettingMenuController::class,'index'])->name('setting-menu')->middleware('auth');
Route::get('/setting-menu-add', [SettingMenuController::class,'add'])->name('setting-menu-add')->middleware('auth');
Route::post('/setting-menu-process', [SettingMenuController::class,'process'])->name('setting-menu-process')->middleware('auth');
Route::get('/setting-menu-edit/{id}', [SettingMenuController::class,'edit'])->name('setting-menu-edit')->middleware('auth');
Route::post('/setting-menu-update/{id}', [SettingMenuController::class,'update'])->name('setting-menu-update')->middleware('auth');
Route::post('/setting-menu-delete', [SettingMenuController::class,'delete'])->name('setting-menu-delete')->middleware('auth');
Route::get('/setting-master', [SettingMenuController::class,'settingmaster'])->name('setting-master')->middleware('auth');

Route::get('/setting-role', [SettingRoleController::class,'index'])->name('setting-role')->middleware('auth');
Route::get('/setting-role-add', [SettingRoleController::class,'add'])->name('setting-role-add')->middleware('auth');
Route::post('/setting-role-process', [SettingRoleController::class,'process'])->name('setting-role-process')->middleware('auth');
Route::get('/setting-role-edit/{id}', [SettingRoleController::class,'edit'])->name('setting-role-edit')->middleware('auth');
Route::post('/setting-role-update/{id}', [SettingRoleController::class,'update'])->name('setting-role-update')->middleware('auth');
Route::post('/setting-role-delete', [SettingRoleController::class,'delete'])->name('setting-role-delete')->middleware('auth');
Route::get('/setting-role-menu/{id}', [SettingRoleController::class,'rolemenu'])->name('setting-role-menu')->middleware('auth');
Route::post('/setting-role-update-role-menu', [SettingRoleController::class,'updaterolemenu'])->name('setting-role-update-role-menu')->middleware('auth');

Route::get('/setting-user', [UserController::class,'index'])->name('setting-user')->middleware('auth');
Route::get('/setting-user-add', [UserController::class,'add'])->name('setting-user-add')->middleware('auth');
Route::post('/setting-user-process', [UserController::class,'process'])->name('setting-user-process')->middleware('auth');
Route::get('/setting-user-edit/{id}', [UserController::class,'edit'])->name('setting-user-edit')->middleware('auth');
Route::post('/setting-user-update/{id}', [UserController::class,'update'])->name('setting-user-update')->middleware('auth');
Route::get('/setting-user-password/{id}', [UserController::class,'ubahpassword'])->name('setting-user-password')->middleware('auth');
Route::post('/setting-user-update-password/{id}', [UserController::class,'updatepassword'])->name('setting-user-update-password')->middleware('auth');
Route::post('/setting-user-delete', [UserController::class,'delete'])->name('setting-user-delete')->middleware('auth');

Route::get('/setting-kategori-input', [SettingKategoriController::class,'index'])->name('setting-kategori-input')->middleware('auth');
Route::get('/setting-kategori-input-add', [SettingKategoriController::class,'add'])->name('setting-kategori-input-add')->middleware('auth');
Route::post('/setting-kategori-input-process', [SettingKategoriController::class,'process'])->name('setting-kategori-input-process')->middleware('auth');
Route::get('/setting-kategori-input-edit/{id}', [SettingKategoriController::class,'edit'])->name('setting-kategori-input-edit')->middleware('auth');
Route::post('/setting-kategori-input-update/{id}', [SettingKategoriController::class,'update'])->name('setting-kategori-input-update')->middleware('auth');
Route::post('/setting-kategori-input-delete', [SettingKategoriController::class,'delete'])->name('setting-kategori-input-delete')->middleware('auth');
Route::get('/setting-status-performance',[SettingStatusPerformanceController::class,'index'])->name('setting-status-performance')->middleware('auth');
Route::post('/setting-status-performance-process',[SettingStatusPerformanceController::class,'process'])->name('setting-status-performance-process')->middleware('auth');
Route::post('/setting-status-performance-update/{id}',[SettingStatusPerformanceController::class,'update'])->name('setting-status-performance-update')->middleware('auth');
Route::post('/setting-status-performance-delete',[SettingStatusPerformanceController::class,'delete'])->name('setting-status-performance-delete')->middleware('auth');


Route::get('/adm-petunjuk-teknis',[PetunjukTeknisController::class,'index'])->name('adm-petunjuk-teknis')->middleware('auth');
Route::get('/adm-petunjuk-teknis-add',[PetunjukTeknisController::class,'add'])->name('adm-petunjuk-teknis-add')->middleware('auth');
Route::post('/adm-petunjuk-teknis-process',[PetunjukTeknisController::class,'process'])->name('adm-petunjuk-teknis-process')->middleware('auth');
Route::get('/adm-petunjuk-teknis-edit/{id}',[PetunjukTeknisController::class,'edit'])->name('adm-petunjuk-teknis-edit')->middleware('auth');
Route::post('/adm-petunjuk-teknis-update/{id}',[PetunjukTeknisController::class,'update'])->name('adm-petunjuk-teknis-update')->middleware('auth');
Route::post('/adm-petunjuk-teknis-delete',[PetunjukTeknisController::class,'delete'])->name('adm-petunjuk-teknis-delete')->middleware('auth');

Route::get('/adm-master-input-1',[MasterInputController1::class,'index'])->name('adm-master-input-1')->middleware('auth');
Route::get('/adm-master-input-1-add',[MasterInputController1::class,'add'])->name('adm-master-input-1-add')->middleware('auth');
Route::post('/adm-master-input-1-process',[MasterInputController1::class,'process'])->name('adm-master-input-1-process')->middleware('auth');
Route::get('/adm-master-input-1-edit/{id}',[MasterInputController1::class,'edit'])->name('adm-master-input-1-edit')->middleware('auth');
Route::post('/adm-master-input-1-update/{id}',[MasterInputController1::class,'update'])->name('adm-master-input-1-update')->middleware('auth');
Route::post('/adm-master-input-1-delete',[MasterInputController1::class,'delete'])->name('adm-master-input-1-delete')->middleware('auth');

Route::get('/adm-master-input-2',[MasterInputController2::class,'index'])->name('adm-master-input-2')->middleware('auth');
Route::get('/adm-master-input-2-add',[MasterInputController2::class,'add'])->name('adm-master-input-2-add')->middleware('auth');
Route::post('/adm-master-input-2-process',[MasterInputController2::class,'process'])->name('adm-master-input-2-process')->middleware('auth');
Route::get('/adm-master-input-2-edit/{id}',[MasterInputController2::class,'edit'])->name('adm-master-input-2-edit')->middleware('auth');
Route::post('/adm-master-input-2-update/{id}',[MasterInputController2::class,'update'])->name('adm-master-input-2-update')->middleware('auth');
Route::post('/adm-master-input-2-delete',[MasterInputController2::class,'delete'])->name('adm-master-input-2-delete')->middleware('auth');

Route::get('/adm-master-input-3',[MasterInputController3::class,'index'])->name('adm-master-input-3')->middleware('auth');
Route::get('/adm-master-input-3-add',[MasterInputController3::class,'add'])->name('adm-master-input-3-add')->middleware('auth');
Route::post('/adm-master-input-3-process',[MasterInputController3::class,'process'])->name('adm-master-input-3-process')->middleware('auth');
Route::get('/adm-master-input-3-edit/{id}',[MasterInputController3::class,'edit'])->name('adm-master-input-3-edit')->middleware('auth');
Route::post('/adm-master-input-3-update/{id}',[MasterInputController3::class,'update'])->name('adm-master-input-3-update')->middleware('auth');
Route::post('/adm-master-input-3-delete',[MasterInputController3::class,'delete'])->name('adm-master-input-3-delete')->middleware('auth');

Route::get('/adm-master-input-4',[MasterInputController4::class,'index'])->name('adm-master-input-4')->middleware('auth');
Route::get('/adm-master-input-4-add',[MasterInputController4::class,'add'])->name('adm-master-input-4-add')->middleware('auth');
Route::post('/adm-master-input-4-process',[MasterInputController4::class,'process'])->name('adm-master-input-4-process')->middleware('auth');
Route::get('/adm-master-input-4-edit/{id}',[MasterInputController4::class,'edit'])->name('adm-master-input-4-edit')->middleware('auth');
Route::post('/adm-master-input-4-update/{id}',[MasterInputController4::class,'update'])->name('adm-master-input-4-update')->middleware('auth');
Route::post('/adm-master-input-4-delete',[MasterInputController4::class,'delete'])->name('adm-master-input-4-delete')->middleware('auth');

Route::get('/adm-master-input-4-par',[MasterInputController4Parameter::class,'index'])->name('adm-master-input-4-par')->middleware('auth');
Route::post('/adm-master-input-4-par-process',[MasterInputController4Parameter::class,'process'])->name('adm-master-input-4-par-process')->middleware('auth');
Route::post('/adm-master-input-4-par-update/{id}',[MasterInputController4Parameter::class,'update'])->name('adm-master-input-4-par-update')->middleware('auth');
Route::post('/adm-master-input-4-par-delete',[MasterInputController4Parameter::class,'delete'])->name('adm-master-input-4-par-delete')->middleware('auth');

Route::post('/adm-master-input-4-par-cari',[MasterInputController4Parameter::class,'caritarget'])->name('adm-master-input-4-par-cari')->middleware('auth');

Route::get('/adm-master-input-5',[MasterInputController5::class,'index'])->name('adm-master-input-5')->middleware('auth');
Route::get('/adm-master-input-5-add',[MasterInputController5::class,'add'])->name('adm-master-input-5-add')->middleware('auth');
Route::post('/adm-master-input-5-process',[MasterInputController5::class,'process'])->name('adm-master-input-5-process')->middleware('auth');
Route::get('/adm-master-input-5-edit/{id}',[MasterInputController5::class,'edit'])->name('adm-master-input-5-edit')->middleware('auth');
Route::post('/adm-master-input-5-update/{id}',[MasterInputController5::class,'update'])->name('adm-master-input-5-update')->middleware('auth');
Route::post('/adm-master-input-5-delete',[MasterInputController5::class,'delete'])->name('adm-master-input-5-delete')->middleware('auth');

Route::get('/adm-master-input-6',[MasterInputController6::class,'index'])->name('adm-master-input-6')->middleware('auth');
Route::get('/adm-master-input-6-add',[MasterInputController6::class,'add'])->name('adm-master-input-6-add')->middleware('auth');
Route::post('/adm-master-input-6-process',[MasterInputController6::class,'process'])->name('adm-master-input-6-process')->middleware('auth');
Route::get('/adm-master-input-6-edit/{id}',[MasterInputController6::class,'edit'])->name('adm-master-input-6-edit')->middleware('auth');
Route::post('/adm-master-input-6-update/{id}',[MasterInputController6::class,'update'])->name('adm-master-input-6-update')->middleware('auth');
Route::post('/adm-master-input-6-delete',[MasterInputController6::class,'delete'])->name('adm-master-input-6-delete')->middleware('auth');


//MENU
Route::get('/menu-input-1',[Input1Controller::class,'index'])->name('menu-input-1')->middleware('auth');
// Route::get('/create-admin', function(){
    //     $payload = [
        //         "user_id"=>'admin',
        //         "user_name"=>'Administrator',
        //         "user_role"=>'admin',
        //         "user_email"=>'anhari@smarthubtech.co.id',
        //         "user_password"=> Hash::make('admin'),
        //     ];
        
        //     User::create($payload);
        
        // });
