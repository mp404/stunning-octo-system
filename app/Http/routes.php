<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/about', 'PagesController@about');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

//api routes
Route::post('/signup', function ()
{
    $credentials = Input::only('email', 'password');

    try {
        $user = User::create($credentials);
    } catch (Exception $e) {
        return Response::json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
    }

    $token = JWTAuth::fromUser($user);

    return Response::json(compact('token'));
});

//Route::resource('api/v1/authorize', 'Api\V1\Authorize');

Route::group([
    'prefix' => 'api/v1',
    //'namespace' => 'Api\V1'
    'middleware' => 'test'
], function () {

    Route::post('/register', 'Api\V1\Authorize@register');
    Route::post('/login', 'Api\V1\Authorize@login');

});








