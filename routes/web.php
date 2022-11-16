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

    Route::get('npps/options','NppController@options')->name('npps.options');
    Route::get('npps/proses','NppController@diProses')->name('npps.proses');
    Route::get('npps/detail','NppController@Detail')->name('npps.detail');
    Route::get('npps/print','NppController@Print')->name('npps.print');
    Route::resource('npps','NppController');

    Route::resource('details','DetailNppController');
    Route::get('bpbs/print',"BpbController@Print")->name('bpbs.print');
    Route::get('/bpbs/administrasi','BpbController@administrasi')->name('bpbs.administrasi');
    Route::get('/bpbs/elektrik','BpbController@elektrik')->name('bpbs.elektrik');
    Route::get('/bpbs/sparepart','BpbController@sparepart')->name('bpbs.sparepart');
    Route::get('/bpbs/mobil','BpbController@mobil')->name('bpbs.mobil');
    Route::get('/bpbs/spinning','BpbController@spinning')->name('bpbs.spinning');
    Route::get('/bpbs/pt','BpbController@pt')->name('bpbs.pt');
    Route::get('/bpbs/um','BpbController@um')->name('bpbs.um');
    Route::resource('bpbs','BpbController');
    Route::resource('/detail_bpbs','DetailBpbController');

    Route::resource('suppliers','SupplierController');
    Route::get('pembayarans/options','PembayaranController@options')->name('pembayarans.options');
    Route::resource('pembayarans','PembayaranController');
});

Route::get('json', function(){
    return \App\npp::with('details.bpbs')->find(1);
});

Route::fallback(function(){
    return "Alamat Route Salah";
});


