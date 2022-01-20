<?php

namespace App\Providers;

use App\Parser\Parser;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ParseCssProvider extends ServiceProvider
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
        App::bind('parser', Parser::class);
    }
}
