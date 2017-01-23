<?php

Route::group(['middleware' => 'web'], function () {

    /**
     * Group for admin
     */
    Route::group([
        'prefix' => 'admin/faq',
        'middleware' => ['auth'],
        'namespace' => 'Ourgarage\Faq\Http\Controllers\Admin'
    ], function () {

        /**
         * Group FAQ Categories
         */
        Route::group(['prefix' => '/categories'], function () {
            Route::get('/', 'FaqCategoryController@index')->name('faq::admin::categories::index');
            Route::get('/create', 'FaqCategoryController@create')->name('faq::admin::categories::create');
            Route::match(['put', 'post'], '/store/{id?}', 'FaqCategoryController@store')
                ->name('faq::admin::categories::store');
            Route::get('/{id}', 'FaqCategoryController@edit')->name('faq::admin::categories::edit');
            Route::post('/status/{id}/{status}', 'FaqCategoryController@changeStatus')
                ->name('faq::admin::categories::changeStatus');
            Route::delete('/{id}', 'FaqCategoryController@destroy')->name('faq::admin::categories::destroy');
        });

        /**
         * Group question-answer
         */
        Route::group(['prefix' => '/qa'], function () {
            Route::get('/', 'FaqController@index')->name('faq::admin::qa::index');
            Route::get('/create', 'FaqController@create')->name('faq::admin::qa::create');
            Route::match(['put', 'post'], '/store/{id?}', 'FaqController@store')->name('faq::admin::qa::store');
            Route::get('/{id}', 'FaqController@edit')->name('faq::admin::qa::edit');
            Route::post('/status/{id}/{status}', 'FaqController@changeStatus')->name('faq::admin::qa::changeStatus');
            Route::delete('/{id}', 'FaqController@destroy')->name('faq::admin::qa::destroy');
        });
    });

    /**
     * Group for front
     */
    Route::group(['prefix' => '/faq', 'namespace' => 'Ourgarage\Faq\Http\Controllers'], function () {
        Route::get('/', 'FaqController@index')->name('faq::front::index');
    });
});
