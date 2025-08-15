<?php

namespace App\Providers;

use App\Services\CacheService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
        config()->set('cache.time', CacheService::cacheTime());
        config()->set('seotools.meta.webmaster_tags', setting('webmaster'));
        Blade::directive('setting', function ($expression) {
            return "<?php echo setting({$expression}); ?>";
        });
    }
}
