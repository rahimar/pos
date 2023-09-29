<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Account\HeadController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Sales\SalesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('adminDashboard');
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/admin/add-category', [CategoryController::class, 'create'])->name('addcategory');
    Route::post('/admin/add-category', [CategoryController::class, 'store'])->name('addcategory');
    Route::post('/admin/update-category', [CategoryController::class, 'update'])->name('updatecategory');
    Route::get('/admin/edit-category/{id}', [CategoryController::class, 'edit'])->name('editcategory');
    Route::get('/admin/delete-category/{id}', [CategoryController::class, 'delete'])->name('deletecategory');
    
    Route::get('/admin/brand', [BrandController::class, 'index'])->name('brand');
    Route::get('/admin/add-brand', [BrandController::class, 'create'])->name('addbrand');
    Route::post('/admin/add-brand', [BrandController::class, 'store'])->name('addbrand');
    Route::post('/admin/update-brand', [BrandController::class, 'update'])->name('updatebrand');
    Route::get('/admin/edit-brand/{id}', [BrandController::class, 'edit'])->name('editbrand');
    Route::get('/admin/delete-brand/{id}', [BrandController::class, 'delete'])->name('deletebrand');

    Route::get('/admin/unit', [UnitController::class, 'index'])->name('unit');
    Route::get('/admin/add-unit', [UnitController::class, 'create'])->name('addunit');
    Route::post('/admin/add-unit', [UnitController::class, 'store'])->name('addunit');
    Route::post('/admin/update-unit', [UnitController::class, 'update'])->name('updateunit');
    Route::get('/admin/edit-unit/{id}', [UnitController::class, 'edit'])->name('editunit');
    Route::get('/admin/delete-unit/{id}', [UnitController::class, 'delete'])->name('deleteunit');

    Route::get('/admin/register', [RegisterController::class, 'index'])->name('companyregister');
    Route::get('/admin/add-register', [RegisterController::class, 'create'])->name('addregister');
    Route::post('/admin/add-register', [RegisterController::class, 'store'])->name('addregister');
    Route::post('/admin/update-register', [RegisterController::class, 'update'])->name('updateregister');
    Route::get('/admin/edit-register/{id}', [RegisterController::class, 'edit'])->name('editregister');
    Route::get('/admin/delete-register/{id}', [RegisterController::class, 'delete'])->name('deleteregister');

    Route::get('/admin/acchead', [HeadController::class, 'index'])->name('acchead');
    Route::get('/admin/add-head', [HeadController::class, 'create'])->name('addhead');
    Route::post('/admin/add-head', [HeadController::class, 'store'])->name('addhead');
    Route::post('/admin/update-head', [HeadController::class, 'update'])->name('updatehead');
    Route::get('/admin/edit-head/{id}', [HeadController::class, 'edit'])->name('edithead');
    Route::get('/admin/delete-head/{id}', [HeadController::class, 'delete'])->name('deletehead');


    Route::get('/admin/sendsms', [MessageController::class, 'sendsms'])->name('sendsms');
    Route::get('/admin/message', [MessageController::class, 'index'])->name('message');
    Route::get('/admin/add-message', [MessageController::class, 'create'])->name('addmessage');
    Route::post('/admin/add-message', [MessageController::class, 'store'])->name('addmessage');
    Route::post('/admin/update-message', [MessageController::class, 'update'])->name('updatemessage');
    Route::get('/admin/edit-message/{id}', [MessageController::class, 'edit'])->name('editmessage');
    Route::get('/admin/delete-message/{id}', [MessageController::class, 'delete'])->name('deletemessage');


    
    Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
    Route::get('/admin/add-product', [ProductController::class, 'create'])->name('addproduct');
    Route::post('/admin/add-product', [ProductController::class, 'store'])->name('addproduct');
    Route::post('/admin/update-product', [ProductController::class, 'update'])->name('updateproduct');
    Route::get('/admin/edit-product/{id}', [ProductController::class, 'edit'])->name('editproduct');
    Route::get('/admin/delete-product/{id}', [ProductController::class, 'delete'])->name('deleteproduct');
    Route::get('/admin/category-productid/{id}', [ProductController::class, 'catByProductID'])->name('catbyproductid');


    Route::get('/admin/purchaseitems', [PurchaseController::class, 'index'])->name('purchaseitems');
    Route::get('/admin/add-purchaseitems', [PurchaseController::class, 'create'])->name('addpurchaseitems');
    Route::post('/admin/add-purchaseitems', [PurchaseController::class, 'store'])->name('addpurchaseitems');
    Route::post('/admin/update-purchaseitems', [PurchaseController::class, 'update'])->name('updatepurchaseitems');
    Route::get('/admin/edit-purchaseitems/{id}', [PurchaseController::class, 'edit'])->name('editpurchaseitems');

    Route::get('/admin/salesitems', [SalesController::class, 'index'])->name('salesitems');
    Route::get('/admin/add-salesitems', [SalesController::class, 'create'])->name('addsalesitems');
    Route::post('/admin/add-salesitems', [SalesController::class, 'store'])->name('addsalesitems');
    Route::post('/admin/update-salesitems', [SalesController::class, 'update'])->name('updatesalesitems');
    Route::get('/admin/edit-salesitems/{id}', [SalesController::class, 'edit'])->name('editsalesitems');



});

require __DIR__.'/auth.php';
