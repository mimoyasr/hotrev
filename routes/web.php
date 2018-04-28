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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('managers', 'ManagerController')->except(['show'])->middleware('auth','Admin');
Route::get('/managers/getdata','ManagerController@getdata')->name('managers.data');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('receiptionist', 'ReceptionistController@index')->name('receiptionist.index');










//--------------------------------------------------------------------------------------//

//---floors--//
Route::get('floors','FloorController@index')->name('floors.index');
Route::get('floors/getdata','FloorController@getdata')->name('floors.data');
Route::get('floors/create','FloorController@create')->name('floors.create');
Route::post('floors/store','FloorController@store')->name('floors.store');
Route::get('floors/{id}/edit', 'FloorController@edit')->name('floors.edit');
Route::post('floors/{id}', 'FloorController@update')->name('floors.update');
Route::delete('floors/{id}', 'FloorController@delete')->name('floors.delete');

//--------------------------------------------------------//

//rooms routes//
Route::get('rooms','RoomController@index')->name('rooms.index');
Route::get('rooms/getdata','RoomController@getdata')->name('rooms.data');
Route::get('rooms/create','RoomController@create')->name('rooms.create');
Route::post('rooms/store','RoomController@store')->name('rooms.store');
Route::get('rooms/{id}/edit', 'RoomController@edit')->name('rooms.edit');
Route::post('rooms/{id}', 'RoomController@update')->name('rooms.update');
Route::delete('rooms/{id}', 'RoomController@delete')->name('rooms.delete');
//--------------------------------------------------------//





































//------------------------------------------------------------------------------------//
//approve pinding datatable
Route::get('/pendingclientsdatatablesapprove', 'PendingClientsDataTablesApproveController@index')
    ->name('pendingclientsdatatablesapprove.index');
//approve pinding
Route::get('/pendingclients', 'PendingClientsController@index')
    ->name('pendingclients.index');
Route::put('/pendingclients/{id}', 'PendingClientsController@update')
    ->name('pendingclients.update');


//------------------------------------------------------------------------------------//
//Approved clients datatable
Route::get('/approvedclientsdatatables', 'ApprovedClientsDataTablesController@index')
    ->name('approvedclientsdatatables.index');


//Approved clients
Route::get('/approvedclients', 'ApprovedClientsController@index')
    ->name('approvedclients.index');

//------------------------------------------------------------------------------------//

//Approved clients datatable reservations
Route::get('/approvedclientsreservations', 'ApprovedClientsReservationsDataTablesController@index')
    ->name('approvedclientsreservationsdatatables.index');


//Approved clients reservations
Route::get('/approvedclientsreservations', 'ApprovedClientsReservationsController@index')
    ->name('approvedclientsreservations.index');

//------------------------------------------------------------------------------------//
