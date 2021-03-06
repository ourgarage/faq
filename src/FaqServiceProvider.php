<?php

namespace Ourgarage\Faq;

use Illuminate\Support\ServiceProvider;

class FaqServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__ . '/routes/web.php';

        $this->loadViewsFrom(__DIR__.'/resources/views', 'faq');

        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'faq');

        $this->publishes([
            __DIR__.'/resources/assets' => public_path('packages/faq'),
        ], 'faq');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        view()->composer('faq::admin.qa.qa', \Ourgarage\Faq\Http\ViewComposers\FaqCategoriesComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make(Http\Controllers\Admin\FaqController::class);

        $this->app->make(Http\Controllers\Admin\FaqCategoryController::class);

        $this->app->make(Http\Controllers\FaqController::class);

        $this->mergeConfigFrom(__DIR__.'/config/faq.php', 'packages');
    }
}
