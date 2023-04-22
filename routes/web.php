<?php

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
    return view('admin.auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/posts','PostController@index')->middleware(['auth'])->name('post.index');
Route::get('/post/create','PostController@create')->middleware(['auth'])->name('post.create');
Route::post('/post/store','PostController@store')->middleware(['auth'])->name('post.store');
Route::get('/post/show/{id}','PostController@show')->middleware(['auth'])->name('post.show');
Route::post('/comment','CommentController@store')->middleware(['auth'])->name('comment.store');

require __DIR__.'/auth.php';

//admin routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::middleware('guest:admin')->group(function(){
        //login routes
        Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        Route::Post('login', 'AuthenticatedSessionController@store')->name('login');
    });
    
    Route::middleware('admin')->group(function(){
        Route::get('/dashboard', 'Homecontroller@index')->name('dashboard');
        Route::get('logout', 'AuthenticatedSessionController@destroy')->name('logout');

        Route::get('/users', 'UsersController@index')->name('users.index');
        Route::get('/users/search', 'UsersController@index')->name('users.search');
        Route::get('/users/getDataBetweenDates', 'UsersController@getDataBetweenDates')->name('users.getDataBetweenDates');
        Route::get('/user/create', 'UsersController@create')->name('user.create');
        Route::post('/user/store', 'UsersController@store')->name('user.store');
        Route::get('/user/edit/{id}', 'UsersController@edit')->name('user.edit');
        Route::post('/user/edit/store', 'UsersController@update')->name('user.edit.store');
        Route::get('/user/delete/{id}', 'UsersController@delete')->name('user.delete');
        Route::get('/user/show/{id}', 'UsersController@show')->name('user.show');

        //Admin Languages Routes
        Route::get('/languages', 'LanguageController@index')->name('languages.index');
        Route::get('/languages/search', 'LanguageController@index')->name('languages.search');
        Route::get('/language/create', 'LanguageController@create')->name('language.create');
        Route::post('/language/store', 'LanguageController@store')->name('language.store');
        Route::get('/language/edit/{id}', 'LanguageController@edit')->name('language.edit');
        Route::get('/language/delete/{id}', 'LanguageController@delete')->name('language.delete');

        //Talent Routes
        Route::get('/talents', 'TalentController@index')->name('talents.index');
        Route::get('/talents/search', 'TalentController@index')->name('talents.search');
        Route::get('/talents/view/{id}', 'TalentController@show_talents')->name('talents.view');


        //TalentHunt Subscriptions Routes
        Route::get('/talents/subscription', 'TalentHuntSubscriptions@index')->name('talents.subscriptions');
        Route::get('/talents/subscription/invoice/{id}', 'TalentHuntSubscriptions@invoice')->name('talents.subscriptions.invoice');
        Route::get('/talents/subscription/show/{id}', 'TalentHuntSubscriptions@showTalentSubscription')->name('talents.subscriptions.show');
        Route::get('/talents/subscription/search', 'TalentHuntSubscriptions@index')->name('talents.subscription.search');

        //Admin Banner Routes
        Route::get('/banners', 'BannerController@index')->name('banners.index');
        Route::get('/banners/search', 'BannerController@index')->name('banners.search');
        Route::get('/banner/create', 'BannerController@create')->name('banner.create');
        Route::post('/banner/store', 'BannerController@store')->name('banner.store');
        Route::get('/banner/edit/{id}', 'BannerController@edit')->name('banner.edit');
        Route::get('/banner/delete/{id}', 'BannerController@delete')->name('banner.delete');

        //Admin Movies Routes
        Route::get('/movies', 'MoviesController@index')->name('movies.index');
        Route::get('/movies/search', 'MoviesController@index')->name('search.movies');
        Route::get('/movies/between-dates', 'MoviesController@getDataBetweenDates')->name('movies.between-dates');
        Route::get('/movies/create', 'MoviesController@create')->name('movies.create');
        Route::post('/movies/store', 'MoviesController@store')->name('movies.store');
        Route::get('/movies/edit/{id}', 'MoviesController@edit')->name('movies.edit');
        Route::post('/movies/edit/store', 'MoviesController@update')->name('movies.edit.store');
        Route::get('/movies/view/{id}', 'MoviesController@show')->name('movies.show');
        Route::get('/movies/delete/{id}', 'MoviesController@delete')->name('movies.delete');

        
        //Admin Genre Routes
        Route::get('/genres', 'GenreController@index')->name('genres.index');
        Route::get('/genres/search', 'GenreController@index')->name('genres.search');
        Route::get('/genre/create', 'GenreController@create')->name('genre.create');
        Route::post('/genre/store', 'GenreController@store')->name('genre.store');
        Route::get('/genre/edit/{id}', 'GenreController@edit')->name('genre.edit');
        Route::get('/genre/delete/{id}', 'GenreController@delete')->name('genre.delete');

        //Admin Advertisement Routes
        Route::get('/advertisements', 'AdvertisementController@index')->name('advertisements.index');
        Route::get('/advertisements/search', 'AdvertisementController@index')->name('advertisements.search');
        Route::get('/advertisement/create', 'AdvertisementController@create')->name('advertisement.create');
        Route::post('/advertisement/store', 'AdvertisementController@store')->name('advertisement.store');
        Route::get('/advertisement/edit/{id}', 'AdvertisementController@edit')->name('advertisement.edit');
        Route::get('/advertisement/delete/{id}', 'AdvertisementController@delete')->name('advertisement.delete');

        //Orders Routes
        Route::get('/orders','OrdersController@showOrders')->name('orders.index');
        Route::get('/orders/details/{id}','OrdersController@showOrderDetails')->name('orders.details');

        //subscriptions Routes
        Route::get('/subscriptions','SubscriptionController@index')->name('subscriptions.index');
        Route::get('/subscriptions/search','SubscriptionController@index')->name('subscriptions.search');
        Route::get('/subscription/details/{id}','SubscriptionController@showOrderDetails')->name('subscription.details');

        //Movies plans Routes
        Route::get('/movies/plans','MoviePlansController@index')->name('plans.index');
        Route::get('/movies/search','MoviePlansController@index')->name('plans.search');
        Route::get('/plans/create', 'MoviePlansController@create')->name('plans.create');
        Route::post('/plans/store', 'MoviePlansController@store')->name('plans.store');
        Route::get('/plans/edit/{id}', 'MoviePlansController@edit')->name('plans.edit');
        Route::get('/plans/delete/{id}', 'MoviePlansController@delete')->name('plans.delete');

        Route::get('/post/index', 'MoviePlansController@delete')->name('plans.delete');


    });
    
});

