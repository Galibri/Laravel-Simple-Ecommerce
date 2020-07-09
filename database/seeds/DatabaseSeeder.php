<?php

use App\Models\Admin\Brand;
use App\Models\Admin\Product;
use Illuminate\Database\Seeder;
use App\Models\Admin\ProductCategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        File::deleteDirectory(public_path('uploads/images'));
        $this->call(UserSeeder::class);
        factory(Brand::class, 6)->create();
        factory(ProductCategory::class, 6)->create();
        factory(Product::class, 15)->create();
    }
}
