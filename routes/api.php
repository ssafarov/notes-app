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

//    Route::get('/notes', function (Request $request) {
//        return [1];
//    });

    Route::resource('notes', 'NotesController');

    Route::get('/note/{id}', 'NotesController@show');
    Route::post('/note/{id}', 'NotesController@update');
    Route::put('/note/create', 'NotesController@store');
    Route::delete('/note/{id}', 'NotesController@destroy');
