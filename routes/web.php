<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\SupplierController;
use Faker\Guesser\Name;
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

Route::controller(SupplierController::class)->group(function(){

   Route::get('allSupliers/', 'supplierAll')->name('supplier.all');

   Route::get('supplyForm/','supplyAdd')->name('supplier.add');

   Route::post('addSupliers/', 'supplierStore')->name('supplier.store');

   Route::get('supplyEdit/{id}','supplyEdit')->name('supplier.edit');

   Route::put('updateSupliers/', 'supplierUpdate')->name('supplier.update');
   Route::get('deleteSupliers/{id}', 'supplierDelete')->name('supplier.delete');
});

Route::controller(CustomerController::class)->group(function(){

    Route::get('allCustomers/', 'customerAll')->name('customer.all');
 
    Route::get('customerForm/','customerAdd')->name('customer.add');
 
    Route::post('addCustomers/', 'customerStore')->name('customer.store');
 
    Route::get('customerEdit/{id}','customerEdit')->name('customer.edit');
 
    Route::put('updateCustomers/', 'customerUpdate')->name('customer.update');
    Route::get('deleteCustomers/{id}', 'customerDelete')->name('customer.delete');
 });





require __DIR__.'/auth.php';
