<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Logged users routes
Route::group(['middleware' => ['auth'], 'namespace' => 'Auth'], function() {
    Route::get('logout', 'LoginController@logout')->name('logout');
});

// Admin routes , 'role:Seller', 'role:Manufacturer'
Route::group(['middleware' => ['role:Admin|Seller|Manufacturer|Service|User' ], 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');



    Route::any('/change-password', 'AdminController@changePassword')->name('admin.change-password');
    Route::group(['middleware' => ['role:Admin|Seller|Manufacturer|Service' ]], function() {
        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');
        Route::resource('rate', 'RateController');
        Route::get('rate-oc/{id}', 'RateController@actionTime')->name('actionTime');
        Route::resource('about', 'AboutController');
        Route::get('about', 'AboutController@index')->name('admin.about');
        Route::get('about-us', 'AboutController@about')->name('admin.about_us');
        Route::get('privacy', 'AdminController@privacy')->name('admin.privacy');
        Route::get('collection', 'AdminController@collection')->name('admin.collection');
        Route::get('active', 'ProductController@active')->name('active');
        Route::get('/message', 'MessageController@index')->name('message');
        Route::post('/send', 'MessageController@send')->name('sendMessage');
        Route::get('/view_offer', 'UserController@view_offer')->name('view_offer');

    });
    Route::get('product/copy','ProductController@copy')->name('product.copy');
    Route::post('productDel','ProductController@delete')->name('product.del');
    Route::post('productAccept', 'ProductController@accept')->name('product.accept');
    Route::post('productDecline', 'ProductController@decline')->name('product.decline');
    Route::post('delete-picture', 'ProductController@deletePicture')->name('del-pic');
    Route::get('/productType', 'ProductController@type')->name('productTypes');
    Route::get('/selectType', 'ProductController@selectType')->name('selectType');
    Route::get('/selectTypeAll', 'ProductController@selectTypeAll')->name('selectTypeAll');




//    Route::get('/products/pictures', 'ProductController@pictures')->name('pictures');


    Route::resource('product','ProductController');
    Route::resource('service','ServiceController');

});
Route::get('privacyUser', 'UserController@privacy')->name('privacy');

// Routes for this permission
Route::group(['middleware' => ['permission:role-create']], function() { // or permission:user-driver|doctor, etc,etc
    //
});

//Route::get('/', 'ComingController@index')->name('coming');

//Route::get('/', 'HomeController@index')->name('home');

Route::get('ajaxRequest', 'AjaxController@ajaxRequest');
Route::post('ajaxRequest', 'AjaxController@ajaxRequestPost')->name('ajaxRequest.post');
Route::post('getChart', 'AjaxController@getChart')->name('ajaxRequest.getChart');
Route::post('makeOffer', 'AjaxController@makeOffer')->name('ajaxRequest.make_offer');
Route::post('getLogin', 'AjaxController@getlogin')->name('ajaxRequest.getLogin');
Route::post('getReg', 'AjaxController@getReg')->name('ajaxRequest.getReg');
Route::post('getChartGlobal', 'AjaxController@getChartGlobal')->name('ajaxRequest.getChartGlobal');
Route::post('favoriteAjaxRequest', 'AjaxController@favoriteAjax')->name('favoriteAjax.post');
Route::post('ajaxDeletePhoto', 'AjaxController@ajaxRequestDeletePhoto')->name('ajaxDeletePhoto');
Route::post('ajaxFilter', 'AjaxController@productFilter')->name('filterAjax.post');
Route::post('watchFilter', 'AjaxController@watchFilter')->name('watchFilter.post');
Route::post('sortAlpha', 'AjaxController@sortAlpha')->name('sortAlpha');
Route::post('servicesFilter', 'AjaxController@servicesFilter')->name('servicesFilter.post');
Route::post('chartAjaxRequest', 'ChartController@ajaxRequest')->name('chartAjaxRequest.post');

Route::get('/lang/{id}', 'LanguageController@language')->name('lang');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('viewd', 'HomeController@viewd')->name('viewd');
    Route::get('added', 'HomeController@added')->name('added');
    Route::get('view-regions', 'HomeController@allRegions')->name('allRegions');
    Route::get('/chart', 'ChartController@index')->name('chart');
    Route::get('/rate-global', 'RateGlobalController@index')->name('rate.global');
    Route::get('/rate-global-cash', 'RateGlobalController@cash')->name('rate.global-cash');
    Route::get('/rate-local-cash', 'RateGlobalController@local')->name('rate.local-cash');
    Route::get('/favorite', ['middleware' => 'auth',  'uses' => 'FavoriteController@index'])->name('favorite');

    Route::get('/fakes', 'FakeController@index')->name('fakes');
    Route::get('/fake/{id}', 'FakeController@show')->name('fake.product');

    Route::get('/services', 'ServicesController@index')->name('services');
    Route::get('/service/{id}', 'ServicesController@show')->name('service.item');





    Route::get('/products', 'ProductController@index')->name('shop');






    Route::get('/products/watch', 'ProductController@watch')->name('shop-watch');
    Route::get('/product/{id}', 'ProductController@show')->middleware(\App\Http\Middleware\ProductSessionExist::class)->name('shop.product');
    Route::get('/addedProducts/{id}', 'ProductController@addedProducts')->middleware(\App\Http\Middleware\ProductSessionExist::class)->name('addedProducts');
    Route::get('/viewd/{id}', 'ProductController@mostView')->middleware(\App\Http\Middleware\ProductSessionExist::class)->name('most-viewd');

    Route::get('/user/{id}', 'UserController@index')->name('user');
    Route::get('/view_offer', 'UserController@view_offer')->name('view_offer');
    Route::post('acceptOffer', 'UserController@acceptOffer')->name('offerAccept');
    Route::post('refuseOffer', 'UserController@refuseOffer')->name('refuseOffer');
    Route::get('/account', 'UserController@my_account')->name('buyer-account');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/sponsors', 'SponsorsController@index')->name('sponsors');
    Route::get('/contact', 'ContactController@index')->name('contact');


