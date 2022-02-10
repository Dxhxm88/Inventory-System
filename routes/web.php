<?php

use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SignoutController;
use App\Http\Controllers\SupplierController;
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

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::post('/', [LoginController::class, 'login'])->name('index.login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

Route::get('/signout', [SignoutController::class, 'signOut'])->name('logout');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'showEdit'])->name('profile.showEdit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Item
Route::get('/items', [ItemController::class, 'index'])->name('item');
Route::get('/item/add', [ItemController::class, 'showAdd'])->name('item.showAdd');
Route::post('/item/add', [ItemController::class, 'store'])->name('item.store');
Route::get('/item/{id}/delete', [ItemController::class, 'destroy'])->name('item.destroy');
Route::get('/item/{id}/edit', [ItemController::class, 'showEdit'])->name('item.showEdit');
Route::post('/item/{id}/edit', [ItemController::class, 'update'])->name('item.update');

// Supplier
Route::get('/suppliers', [SupplierController::class, 'index'])->name('supplier');
Route::get('/supplier/add', [SupplierController::class, 'showAdd'])->name('supplier.showAdd');
Route::post('/supplier/add', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/{id}/delete', [SupplierController::class, 'destroy'])->name('supplier.destroy');
Route::get('/supplier/{id}/edit', [SupplierController::class, 'showEdit'])->name('supplier.showEdit');
Route::post('/supplier/{id}/edit', [SupplierController::class, 'update'])->name('supplier.update');

// Category
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/add', [CategoryController::class, 'showAdd'])->name('category.showAdd');
Route::post('/category/add', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/{id}/edit', [CategoryController::class, 'showEdit'])->name('category.showEdit');
Route::post('/category/{id}/edit', [CategoryController::class, 'update'])->name('category.update');

// Department
Route::get('/department', [DepartmentController::class, 'index'])->name('department');
Route::get('/department/add', [DepartmentController::class, 'showAdd'])->name('department.showAdd');
Route::post('/department/add', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/department/{id}/delete', [DepartmentController::class, 'destroy'])->name('department.destroy');
Route::get('/department/{id}/edit', [DepartmentController::class, 'showEdit'])->name('department.showEdit');
Route::post('/department/{id}/edit', [DepartmentController::class, 'update'])->name('department.update');


// Borrower
Route::get('/borrower', [BorrowerController::class, 'index'])->name('borrower');
Route::get('/borrower/add', [BorrowerController::class, 'showAdd'])->name('borrower.showAdd');
Route::post('/borrower/add', [BorrowerController::class, 'store'])->name('borrower.store');
Route::get('/borrower/{id}/delete', [BorrowerController::class, 'destroy'])->name('borrower.destroy');
Route::get('/borrower/{id}/edit', [BorrowerController::class, 'showEdit'])->name('borrower.showEdit');
Route::post('/borrower/{id}/edit', [BorrowerController::class, 'update'])->name('borrower.update');
