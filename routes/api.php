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

Route::post('/authorize', 'UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('/publishers/list', 'PublishersController@list');
    Route ::get('/magazines/search', 'MagazinesController@search');
    Route::get('/magazines/{id}', 'MagazinesController@view')
        ->where('id', '[0-9]+');
});
