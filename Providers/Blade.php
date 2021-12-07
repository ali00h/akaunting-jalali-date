<?php


namespace Modules\JalaliDate\Providers;


use App\Traits\DateTime;
use Illuminate\Support\Facades\Blade as Facade;
use Illuminate\Support\ServiceProvider;

class Blade extends ServiceProvider
{
    use DateTime;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Support\Facades\Blade::directive('datetime', function ($expression) {
            return "<?php echo \Morilog\Jalali\Jalalian::forge($expression)->format('Y/m/d H:i:s'); ?>";
        });

        \Illuminate\Support\Facades\Blade::directive('date', function ($expression) {
            return "<?php echo \Morilog\Jalali\Jalalian::forge($expression)->format('Y/m/d'); ?>";
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
