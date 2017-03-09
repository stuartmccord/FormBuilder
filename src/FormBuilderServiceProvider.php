<?php

namespace Stuartmccord\FormBuilder;

use Illuminate\Support\ServiceProvider;
use Stuartmccord\FormBuilder\Bulma\Renderer;

class FormBuilderServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBulmaFormBuilder();

        $this->app->alias('bulma', 'Stuartmccord\FormBuilder\FormBuilder');
    }

    public function registerBulmaFormBuilder()
    {
        $this->app->singleton('bulma', function ($app) {
            $renderer = new Renderer();
            return $form = new FormBuilder($app['form'], $renderer);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'bulma',
            'Stuartmccord\FormBuilder\FormBuilder'
        ];
    }
}
