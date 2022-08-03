<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');

    Route::resource('karyawans','KaryawanController');

    Route::delete('printers/destroy', 'PrinterController@massDestroy')->name('printers.massDestroy');

    Route::resource('printers','PrinterController');

    Route::delete('perbaikans/destroy', 'PerbaikanController@massDestroy')->name('perbaikans.massDestroy');
    Route::resource('perbaikans','PerbaikanController');

    Route::delete('komputers/destroy', 'KomputerController@massDestroy')->name('komputers.massDestroy');
    Route::resource('komputers','KomputerController');

    Route::resource('kliens','KlienController');

    Route::resource('departemens','DepartemenController');

    Route::resource('npps','NppController');
    Route::resource('details','DetailNppController');
    Route::resource('bpbs','BpbController');


});

Route::get('json', function(){
    return \App\npp::with('details.bpbs')->find(1);
});

Route::fallback(function(){
    return "Alamat Route Salah";
});


