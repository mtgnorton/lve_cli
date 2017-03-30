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

$router->group(['namespace' => 'Admin\\System', 'middleware' => 'jwt.auth','prefix'=>'admin'], function () {
   //用户管理路由
    Route::resource('/user', 'UserController');
});


$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
$api->post('/admin/login', '\App\Http\Controllers\Api\V1\Admin\AuthController@login')->name('admin.login');
$api->group(['namespace' => 'App\Http\Controllers\Api\V1\Admin','prefix'=>'admin','middleware'=>'api.auth'], function ($api) {
        $api->get('/test', 'TestController@index');


        $api->get('/articles', 'ArticlesController@index');
        $api->post('/articles', 'ArticlesController@store');
        $api->post('/images/upload', 'ImagesController@store');
    });
});