<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\DoctorController;

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
});
require __DIR__.'/auth.php';
});

