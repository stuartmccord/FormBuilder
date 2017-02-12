<?php

namespace Stuartmccord\FormBuilder;

use Collective\Html\HtmlServiceProvider;
use Stuartmccord\FormBuilder\Bulma\Renderer;

class FormBuilderServiceProvider extends HtmlServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHtmlBuilder();

        $this->registerFormBuilder();

        $this->registerBulmaFormBuilder();

        $this->app->alias('html', 'Collective\Html\HtmlBuilder');
        $this->app->alias('form', 'Collective\Html\Formbuilder');
        $this->app->alias('bulma', 'Stuartmccord\FormBuilder\BulmaFormBuilder');
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
            'html',
            'form',
            'bulma',
            'Collective\Html\HtmlBuilder',
            'Collective\Html\Formbuilder',
            'Stuartmccord\FormBuilder\BulmaFormBuilder'
        ];
    }
}
