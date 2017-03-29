<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::post('/login', 'AuthController@login')->name('admin.login');

    Route::group(['middleware' => 'jwt.auth'], function() {
        Route::get('/articles', 'ArticlesController@index');
        Route::post('/articles', 'ArticlesController@store');
        Route::post('/images/upload', 'ImagesController@store');
    });
});

$router->group(['namespace' => 'Admin\\System', 'middleware' => 'jwt.auth','prefix'=>'admin'], function () {
   //用户管理路由
    Route::resource('/user', 'UserController');
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
$api->group(['namespace' => 'App\Http\Controllers\Api\V1\Admin','prefix'=>'admin','middleware'=>'api.auth'], function ($api) {
        $api->get('/test', 'TestController@index');
    });
});