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

        Route::get('/', 'FaqController@index')->name('faq::admin::index');

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
            Route::get('/', 'FaqQAController@index')->name('faq::admin::qa::index');
            Route::get('/create', 'FaqQAController@create')->name('faq::admin::qa::create');
            Route::match(['put', 'post'], '/store/{id?}', 'FaqQAController@store')->name('faq::admin::qa::store');
            Route::get('/{id}', 'FaqQAController@edit')->name('faq::admin::qa::edit');
            Route::post('/status/{id}/{status}', 'FaqQAController@changeStatus')->name('faq::admin::qa::changeStatus');
            Route::delete('/{id}', 'FaqQAController@destroy')->name('faq::admin::qa::destroy');
        });
    });

    /**
     * Group for front
     */
    Route::group(['prefix' => '/faq', 'namespace' => 'Ourgarage\Faq\Http\Controllers'], function () {
        Route::get('/', 'FaqController@index')->name('faq::front::index');
        Route::get('/{slug}', 'FaqController@show')->name('faq::front::qa');
    });
});
