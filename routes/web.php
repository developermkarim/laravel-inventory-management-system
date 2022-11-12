<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\UnitController;
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
   Route::get('supplier/status/{status}/{id}','status')->name('supplier.status');
});

Route::controller(CustomerController::class)->group(function(){

    Route::get('allCustomers/', 'customerAll')->name('customer.all');
 
    Route::get('customerForm/','customerAdd')->name('customer.add');
 
    Route::post('addCustomers/', 'customerStore')->name('customer.store');
 
    Route::get('customerEdit/{id}','customerEdit')->name('customer.edit');
 
    Route::put('updateCustomers/', 'customerUpdate')->name('customer.update');
    Route::get('deleteCustomers/{id}', 'customerDelete')->name('customer.delete');
    Route::get('customer/status/{status}/{id}','status')->name('customer.status');
 });

 Route::controller(UnitController::class)->group(function(){

  Route::get('allUnits/', 'unitAll')->name('unit.all');
 
Route::get('unitForm/','unitAdd')->name('unit.add');

Route::post('addUnits/', 'unitStore')->name('unit.store');

Route::get('unitEdit/{id}','unitEdit')->name('unit.edit');

Route::put('updateUnits/', 'unitUpdate')->name('unit.update');
Route::get('deleteUnits/{id}', 'unitDelete')->name('unit.delete');
Route::get('unit/status/{status}/{id}','status')->name('unit.status');
 });

 Route::controller(CategoryController::class)->group(function(){

Route::get('allCategories/','categoryAll')->name('category.all');
 
Route::get('categoryForm/','categoryAdd')->name('category.add');

Route::post('addCategories/', 'categoryStore')->name('category.store');

Route::get('categoryEdit/{id}','categoryEdit')->name('category.edit');

Route::put('updateCategories/', 'categoryUpdate')->name('category.update');
Route::get('deleteCategories/{id}', 'categoryDelete')->name('category.delete');

Route::get('category/status/{status}/{id}','status')->name('category.status');

 });


/* Product Controller Routes */
Route::controller(ProductController::class)->group(function(){
    Route::get('allProducts','productAll')->name('product.all');
    Route::get('productForm/','productAdd')->name('product.add');

Route::post('addProducts/', 'productStore')->name('product.store');

Route::get('productEdit/{id}','productEdit')->name('product.edit');

Route::put('updateproducts/', 'productUpdate')->name('product.update');
Route::get('deleteProducts/{id}', 'productDelete')->name('product.delete');

Route::get('product/status/{status}/{id}','status')->name('product.status');
});

/* Manage Purchase Routes */
Route::controller(PurchaseController::class)->group(function(){

    Route::get('allPurchases/', 'purchaseAll')->name('purchase.all');
     
    Route::get('purchaseForm/','purchaseAdd')->name('purchase.add');
    
    Route::post('addPurchases/', 'purchaseStore')->name('purchase.store');
    
    Route::get('purchaseEdit/{id}','purchaseEdit')->name('purchase.edit');
    
    Route::put('updatePurchases/', 'purchaseUpdate')->name('purchase.update');
    Route::get('deletePurchases/{id}', 'purchaseDelete')->name('purchase.delete');
    Route::get('purchasePending/','purchasePending')->name('purchase.pending');
    Route::get('purchaseApproved/{id}','purchaseApproved')->name('purchase.approved');
     });

     Route::controller(InvoiceController::class)->group(function(){
        Route::get('allInvoice/','invoiceAll')->name('invoice.all');
        Route::get('addInvoice/','invoiceAdd')->name('invoice.add');
        Route::post('invoiceStore/','invoiceStore')->name('invoice.store');
        Route::get('invoicePendingList','pendingList')->name('invoice.pending_list');

        Route::get('invoicePendingList','pendingList')->name('invoice.pending_list');
        Route::get('invoiceDelete','invoiceDelete')->name('invoice.delete');
     });


     /* Default Controller Here for ajax request and Others*/
     Route::controller(DefaultController::class)->group(function(){
        Route::get('get-category','getCategory')->name('get-category');
        Route::get('get-product','getProduct')->name('get-product');
        Route::get('checkProductStock','getStock')->name('check-product-stock');
     });

require __DIR__.'/auth.php';
