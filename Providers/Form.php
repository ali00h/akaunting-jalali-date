<?php


namespace Modules\JalaliDate\Providers;



use Form as Facade;
use Illuminate\Support\ServiceProvider as Provider;

class Form extends Provider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        Facade::component('dateTimeGroup', 'jalali-date::partials.form.date_time_group', [
            'name', 'text', 'icon', 'attributes' => ['required' => 'required'], 'value' => null, 'col' => 'col-md-6', 'group_class' => null
        ]);

        Facade::component('dateGroup', 'jalali-date::partials.form.date_group', [
            'name', 'text', 'icon', 'attributes' => ['required' => 'required'], 'value' => null, 'col' => 'col-md-6', 'group_class' => null
        ]);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
