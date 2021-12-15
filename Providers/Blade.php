<?php


namespace Modules\JalaliDate\Providers;


use App\Traits\DateTime;
use Illuminate\Support\Facades\Blade as Facade;
use Illuminate\Support\ServiceProvider;
use Livewire\LivewireBladeDirectives;

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


        \Illuminate\Support\Facades\Blade::directive('livewireStyles', function ($expression) {
            $livewireStyles = LivewireBladeDirectives::livewireStyles($expression);


            $livewireStyles .= '<link rel="stylesheet" href="{{ asset(\'modules\JalaliDate\Resources\assets\sass\persian-datepicker.min.css\') }}"/>';
            $livewireStyles .= '<script defer src="{{ asset(\'modules\JalaliDate\Resources\assets\js\persian-date.min.js\') }}"></script>';
            $livewireStyles .= '<script defer src="{{ asset(\'modules\JalaliDate\Resources\assets\js\persian-datepicker.min.js\') }}"></script>';
            $livewireStyles .= '<script defer src="{{ asset(\'modules\JalaliDate\Resources\assets\js\jalali-date.js?v=\' . module_version(\'jalali-date\')) }}"></script>';


            return $livewireStyles;
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
