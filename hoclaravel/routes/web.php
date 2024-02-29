<?php

use App\Http\Middleware\CheckPermission;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
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
Route::get('/', [HomeController::class, 'index']);

Route::middleware('auth.admin')->prefix('categories')->group(function () {
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

    //Hiển thị form upload
    Route::get('/upload', [CategoriesController::class, 'getFile']);

    //Xử lý file
    Route::post('/upload', [CategoriesController::class, 'handleFile'])->name('categories.upload');
});

Route::get('san-pham/{id}', [HomeController::class, 'getProductDetail']);

// Admin Route
Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('products', ProductsController::class)->middleware('auth.admin.product');
});

// Route::get('/students', function (Request $request){
//     return "Path: ". $request->path();
//     return "URL: ". $request->url();
// });

Route::get('/students', function (Request $request) {
    $path = $request->path(); // Lấy path của request
    $url = $request->url(); // Lấy URL của request
    $fullUrl = $request->fullUrl(); // Lấy all URL của request 
    $fullUrlWithQuery = $request->fullUrlWithQuery(['name' => 'VuThanhTai']); // Add tt vào URL

    return "Path: " . $path . "<br>URL: " . $url . "<br>FullURL: " . $fullUrl . "<br>Add URL: " . $fullUrlWithQuery;
});

Route::get('/admin/post', function (Request $request) {
    // if ($request->is('admin/*')){{  
    //     return 'Request path matches with "admin/*" pattern.';
    // }}

    echo 'Current method HTTP: '. $request->method() . '<br>';
    if ($request->isMethod('get')){  // Ktra phương thức của request 
        echo 'This is Get method HTTP';
    }
});

Route::get('/userIp', function (Request $request) {
    $ipAddress = $request->ip(); // Lấy ra địa chỉ IP của người dùng 
    echo 'Địa chỉ IP là: '.$ipAddress;

});

Route::get('/post', [FormController::class, 'index']);
Route::post('/post', [FormController::class, 'post']);