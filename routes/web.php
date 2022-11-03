<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Admin Routes Controller in grouping system */
Route::controller(AdminController::class)->group(function(){
Route::get('admin/signout','destroy')->name('admin.logout');
Route::get('admin/profile/','profile')->name('admin.profile');
Route::get('admin/edit/{id}','profileEdit')->name('admin.profile.edit');

Route::put('admin/update/{id}','profileUpdate')->name('admin.profile.update');
Route::get('admin/passwordChange/','passwordChange')->name('admin.password.change');

Route::post('admin/passwordUpdate','passwordUpdate')->name('admin.password.updated');
});




require __DIR__.'/auth.php';
