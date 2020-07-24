<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\ProductCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ProductCategory::class, function (Faker $faker) {
    $path = public_path('uploads/images/categories');
    if (!File::isDirectory($path)) {
        File::makeDirectory($path, 0777, true, true);
    }
    return [
        'name'        => $name = $faker->name,
        'slug'        => Str::slug($name),
        'description' => $faker->paragraph(rand(100, 150)),
        'thumbnail'   => $faker->image('public/uploads/images/categories', 300, 300, 'food', false)
    ];
});