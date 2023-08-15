<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\SingleServiceController;
use App\Http\Controllers\Admin\InsuranceController;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware'=>'guest'], function (){
    Route::post('/', [LoginController::class, 'login'])->name('admin.store');
    Route::get('login', [LoginController::class, 'create'])->name('admin.create');
    Route::post('login', [LoginController::class, 'store'])->name('admin.store');

});

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware'=>'auth:admin'], function (){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');

    
});
Route::middleware(['auth:admin'])->group(function () {
    //Department Section
Route::resource('admin/sections', SectionController::class);
//Doctors Section
Route::resource('admin/doctors', DoctorController::class);
Route::post('/admin/doctors/update_password', [DoctorController::class, 'update_password'])->name('doctors.update_password');
Route::post('/admin/doctors/update_status', [DoctorController::class, 'update_status'])->name('doctors.update_status');

Route::resource('/admin/services', SingleServiceController::class);


Route::view('/admin/Add_GroupServices','livewire.GroupServices.include_create')->name('Add_GroupServices');

Route::resource('/admin/insurances', InsuranceController::class);
});
require __DIR__.'/auth.php';
});

