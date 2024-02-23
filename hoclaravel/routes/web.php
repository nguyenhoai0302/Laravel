<?php

use App\Http\Middleware\CheckPermission;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;

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

//Client Route
Route::get('/', function() {
    return '<h1 style="text-align: center;">TRANG CHỦ UNICODE</h1>';
})->name('home');

Route::prefix('categories')->group(function () {
    //Danh sách chuyên mục 
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');

    //Lấy chi tiết 1 chuyên mục (Áp duungj show form sửa chuyên mục)
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

    //Xử lý update chuyên mục
    Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory']);

    //Hiển thị form add DL
    Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');
    
    //Xử lý thêm chuyên mục 
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

    //Xóa chuyên mục
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');
});

// Admin Route
Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('products', ProductsController::class)->middleware('auth.admin.product');
});