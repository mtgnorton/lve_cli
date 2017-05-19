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


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

$api->post('/admin/login', '\App\Http\Controllers\Api\V1\Admin\AuthController@login')->name('admin.login');
//前台登陆
// $api->post('/admin/login', '\App\Http\Controllers\Api\V1\Admin\FrontedLoginController@login')->middleware('jwt.auth:fronted');
//'middleware'=>'jwt.auth:admin'
$api->group(['namespace' => 'App\Http\Controllers\Api\V1\Admin','prefix'=>'admin'], function ($api) {
        $api->get('/test/{id}', 'TestController@test');

        $api->resource('/user', 'UserController');

        $api->get('/articles', 'ArticlesController@index');
        $api->post('/articles', 'ArticlesController@store');
        // $api->post('/images/upload', 'ImagesController@store');
    });
});