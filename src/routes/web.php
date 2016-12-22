<?php

Route::group(['middleware' => 'web'], function () {

    Route::group([
        'prefix' => 'admin/faq',
        'middleware' => ['auth'],
        'namespace' => 'Ourgarage\Faq\Http\Controllers\Admin'
    ], function () {

        Route::get('/', 'FaqController@index')->name('faq::admin::index');

        /**
         * Group FAQ Categories
         */
        Route::group(['prefix' => '/categories'], function () {
            Route::get('/', 'FaqCategoryController@index')->name('faq::admin::categories::index');
            Route::get('/create', 'FaqCategoryController@create')->name('faq::admin::categories::create');
            Route::post('/store', 'FaqCategoryController@store')->name('faq::admin::categories::store');
            Route::get('/{id}', 'FaqCategoryController@edit')->name('faq::admin::categories::edit');
            Route::put('/store/{id}', 'FaqCategoryController@store')->name('faq::admin::categories::update');
            Route::post('/status/{id}', 'FaqCategoryController@status')->name('faq::admin::categories::status');
            Route::delete('/{id}', 'FaqCategoryController@destroy')->name('faq::admin::categories::destroy');
        });

        /**
         * Group question-answer
         */
        Route::group(['prefix' => '/qa'], function () {
            Route::get('/', 'FaqQAController@index')->name('faq::admin::qa::index');
            Route::get('/create', 'FaqQAController@create')->name('faq::admin::qa::create');
            Route::post('/store', 'FaqQAController@store')->name('faq::admin::qa::store');
            Route::get('/{id}', 'FaqQAController@edit')->name('faq::admin::qa::edit');
            Route::put('/store/{id}', 'FaqQAController@store')->name('faq::admin::qa::update');
            Route::post('/status/{id}', 'FaqQAController@status')->name('faq::admin::qa::status');
            Route::delete('/{id}', 'FaqQAController@destroy')->name('faq::admin::qa::destroy');
        });
    });
});
