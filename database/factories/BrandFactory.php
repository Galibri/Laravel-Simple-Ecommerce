<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Admin\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    $path = public_path('uploads/images/brands');
    if(!File::isDirectory($path)){
        File::makeDirectory($path, 0777, true, true);
    }
    return [
        'name' => $name = $faker->company,
        'slug' => Str::slug($name),
        'description' => $faker->paragraph(120),
        'logo' => $faker->image('public/uploads/images/brands', 200, 200, null,  false)
    ];
});
