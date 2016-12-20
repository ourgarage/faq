<?php

Route::group(['middleware' => 'web'], function () {

    Route::group([
        'prefix' => 'admin/faq',
        'middleware' => ['auth'],
        'namespace' => 'Ourgarage\Faq\Http\Controllers\Admin'
    ], function () {

        Route::get('/', 'FaqController@index')->name('faq::admin::index');

        Route::group(['prefix' => '/categories'], function () {
            Route::get('/', 'FaqCategoryController@index')->name('faq::admin::categories::index');
            Route::get('/create', 'FaqCategoryController@create')->name('faq::admin::categories::create');
            Route::post('/store', 'FaqCategoryController@store')->name('faq::admin::categories::store');
            Route::get('/{id}', 'FaqCategoryController@edit')->name('faq::admin::categories::edit');
            Route::put('/{id}', 'FaqCategoryController@update')->name('faq::admin::categories::update');
            Route::delete('/{id}', 'FaqCategoryController@destroy')->name('faq::admin::categories::destroy');
        });

        Route::group(['prefix' => '/qa'], function () {
            Route::get('/', 'FaqQAController@index')->name('faq::admin::qa::index');
            Route::get('/create', 'FaqQAController@create')->name('faq::admin::qa::create');
            Route::post('/store', 'FaqQAController@store')->name('faq::admin::qa::store');
            Route::get('/{id}', 'FaqQAController@edit')->name('faq::admin::qa::edit');
            Route::put('/{id}', 'FaqQAController@update')->name('faq::admin::qa::update');
            Route::delete('/{id}', 'FaqQAController@destroy')->name('faq::admin::qa::destroy');
        });
    });
});
