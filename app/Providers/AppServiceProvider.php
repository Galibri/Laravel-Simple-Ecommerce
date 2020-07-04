<?php

namespace App\Providers;

use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use App\Observers\BrandObserver;
use App\Observers\ProductObserver;
use App\Models\Admin\ProductCategory;
use Illuminate\Support\ServiceProvider;
use App\Observers\ProductCategoryObserver;
use App\Http\Controllers\Frontend\CartController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ProductCategory::observe(ProductCategoryObserver::class);
        Brand::observe(BrandObserver::class);
        Product::observe(ProductObserver::class);
    }
}