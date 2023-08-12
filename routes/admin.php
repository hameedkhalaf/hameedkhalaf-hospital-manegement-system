<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SectionController;

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

    //Department Section
    //, 'index'])->name('section.index');
    //Route::post('section', [DashboardController::class, 'store'])->name('section.store');
    //Route::get('section', [DashboardController::class, 'index'])->name('section.index');
    //Route::get('section', [DashboardController::class, 'index'])->name('section.index');
    
//Route::resource('sections', SectionController::class);
});
Route::middleware(['auth:admin'])->group(function () {
Route::resource('admin/sections', SectionController::class);
});
require __DIR__.'/auth.php';
});

