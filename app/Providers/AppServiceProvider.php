<?php

namespace App\Providers;

use App\Enums\UserRole;
use App\Models\User;
use DB;
use Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureModels();
        $this->preventDestructiveCommands();
        $this->configureUrls();
    }

    private function configureModels()
    {
        Model::shouldBeStrict();
        Model::unguard();
    }

    private function preventDestructiveCommands()
    {
        DB::prohibitDestructiveCommands(
            $this->app->isProduction()
        );
    }

    private function configureUrls()
    {
        if(app()->isProduction()){
            URL::forceScheme('https');
        }
    }
}
