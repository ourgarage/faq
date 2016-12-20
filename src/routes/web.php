<?php

Route::group(['middleware' => 'web'], function () {

    Route::group([
        'prefix' => 'admin/faq',
        'middleware' => ['auth'],
        'namespace' => 'Ourgarage\Faq\Http\Controllers\Admin'
    ], function () {

        Route::get('/', 'FaqController@index')->name('price::admin::index');

    });
});
