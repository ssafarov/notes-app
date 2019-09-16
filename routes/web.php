<?php

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

    Route::get('/', ['as'=> 'welcome', function () {
        return view('welcome');
    }]);

    Route::get('/modern', 'NotesController@modern')->name('index-new');
    Route::get('/modern/note/{id}', 'NotesController@show')->name('view-new');


    Route::resource('notes', 'NotesController');

