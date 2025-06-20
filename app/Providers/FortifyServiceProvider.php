<?php

namespace App\Providers;

use Laravel\Fortify\Fortify;
use Illuminate\Support\ServiceProvider;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Menampilkan form forgot password
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        // Menampilkan form reset password (ini penting)
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });
    }
}
