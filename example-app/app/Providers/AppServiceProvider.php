<?php

namespace App\Providers;

use App\View\Component\Tasks\Listing\Index as ListingIndex;
use App\View\Component\Tasks\Listing\Item as ListingItem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('tasks-listing-index', ListingIndex::class);
        Blade::component('tasks-listing-item', ListingItem::class);
    }
}
