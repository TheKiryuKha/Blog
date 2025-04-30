<?php

namespace App\Providers;

use App\Enums\UserRole;
use App\Models\Comment;
use App\Models\Post;
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

        // gates

        Gate::define('is_admin', function(User $user){
            return $user->role === UserRole::Admin;
        });

        Gate::define('workWithComment', function(User $user, Comment $comment){
            return $user->id === $comment->user_id;
        });

        Gate::define('delete-comment', function(User $user, Comment $comment){
            return $user->id === $comment->user_id OR $user->role === UserRole::Admin;
        });

        Gate::define('workWithPost', function(User $user, Post $post){
            return $user->id === $post->user_id AND $user->role === UserRole::Admin;
        });
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
