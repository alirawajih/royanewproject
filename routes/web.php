<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostNewsController;


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


Route::prefix('admin')
    ->middleware('auth:admin_users')->group(function () {
        Route::get('/home', '\App\Http\Controllers\AccountsController@show')->name('dashboard');

        //// postnews
        Route::resource('post-news', PostNewsController::class);
        Route::get('/editnews', function () {
            return view('AdminPanel.news.edit');
        });
        ////account
        Route::post('/addaccount', '\App\Http\Controllers\AccountsController@register')->name('addaccount');
        Route::get('/editinfo/{id}', '\App\Http\Controllers\AccountsController@editinfo')->name('editinfo');
        Route::resource('Account', \App\Http\Controllers\AccountsController::class);
        Route::post('/passupdate', '\App\Http\Controllers\AccountsController@passupdate')->name('passupdate');
        Route::get('/editaccounts', function () {
            return view('AdminPanel.accounts.edit');
        });
        ////
        Route::get('/informationUser', function () {
            return view('AdminPanel.informationUser');
        })->name('informationUser');

        ///// category
 /// //    Route::post('/addcategory', '\App\Http\Controllers\categoryController@register');
         Route::resource('category', \App\Http\Controllers\categoryController::class);
        Route::get('/addcategory', function () {
            return view('AdminPanel.category.add');
        });
        Route::get('/editcategory', function () {
            return view('AdminPanel.category.edit');
        });


        Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])
            ->name('logout');


    });

Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('register');

Route::get('/admin/login', function () {
    return view('AdminPanel.AdminLogin');
})->name('adminLogin');

Route::get('/admin/regist', function () {
    return view('AdminPanel.AdminRegist');
});
///
///
///
///
///
Route::get('/',[\App\Http\Controllers\displaynews::class,'index'] )->name('firstpage');
Route::get('/Royanews/news/{id}',[\App\Http\Controllers\displaynews::class,'shownews'] )->name('shownews');
Route::get('/Royanews/category/{id}',[\App\Http\Controllers\displaynews::class,'shownewscategory'] )->name('shownewscategory');
Route::get('/search',[\App\Http\Controllers\displaynews::class,'search'] )->name('search');
Route::get('/test',[\App\Http\Controllers\displaynews::class,'infinetscroll'] )->name('infinetscroll');
//
//Route::get('/', function () {
//    return view('index');
//})->name('homepage');
Route::get('/home/category', function () {
    return view('category');
});
Route::get('/home/category/subcategory', function () {
    return view('subcategory');
});
//Route::get('/search', function () {
//    return view('search');
//});


//Route::get('', function () {
//    return view('AdminPanel.resetPassword');
//})->name('resetPassword');

Route::get('/account-recovery', '\App\Http\Controllers\AccountsController@resetform')->name('resetPassword');
//
Route::post('/account-recovery', '\App\Http\Controllers\AccountsController@resetpassword')->name('sendResetlink');


Route::resource('royanews',\App\Http\Controllers\displaynews::class);




////////////////////////////////
/// ////////////////////////////////
/// ///////////////////////////////////////
///


//use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('app');
//});
