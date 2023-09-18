<?php

use App\Contracts\Hammer;
use App\Contracts\Nail;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Teto\HTTP\AcceptLanguage;
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

Route::get('/', function () {
    return view('welcome');
});

// index -> listeleme
// create -> ekleme formunu gösterme
// store -> eklemenin yapılacağı yer
// show  -> görüntüleme
// edit -> düzenleme formunu gösterme
// update -> güncellemenin yapılacağı yer
// destroy -> silinmenin yapılacağı yer
Route::resource('posts', PostController::class);

Route::resource('categories', CategoryController::class);

Route::get('app', function () {
    dd(app());
});
Route::get('about', function () {
    return view('layout.about');
});
Route::get('contact', function () {
    return view('layout.contact');
});
Route::get('admin/login', function () {
    return view('admin.login');
})->name('adminlogin');
Route::get('admin/logout', [AdminController::class, 'getLogout'])->name('logout');
Route::get('admin/index', [AdminController::class, 'index'])->name('admin');
Route::get('admin/category', [AdminController::class, 'category'])->name('category');
Route::post('admin/index', [AdminController::class, 'login'])->name('login');


/*Route::get(
    'carpenter',
    function (Hammer $hammer, Nail $nail) {
        // bana gelen IzeltasCekic mi KorkmazCekic mi belli değil
        $hammer->nailing($nail, "sol üst");
        $hammer->nailing($nail, "sağ üst");
    }
);*/

// Create => create, store
// Read => index, show
// Update => edit, update
// Delete => destroyaa
