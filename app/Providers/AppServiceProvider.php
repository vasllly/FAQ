<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $data = [
                'locate' => str_replace('_', '-', app()->getLocale()),
                'app_name' => config('app.name', 'Laravel'),
                'auth' => Auth::check(),
            ];

            if ($data['auth']) {
                $data['login'] = Auth::user()->login;
            }

            $view->with('data', $data);
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
