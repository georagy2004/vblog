<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
//App\Post::class 中的App\Post 是一个整体
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        // 'user_id' => function(){
        //     return factory(App\User::class)->create()->id;
        // },
        'user_id' => App\User::all()->random()->id,
        'title' => $faker->sentence,
        'body'  => $faker->paragraph,
        'cover_image' => 'noimage.jpg',
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        // 'user_id' => function(){
        //     return factory(App\User::class)->create()->id;
        // },
        'user_id' => App\User::all()->random()->id,
        // 'post_id' => function(){
        //     return factory(App\Post::class)->create()->id;
        // },
        'post_id' => App\Post::all()->random()->id,
        'body'  => $faker->sentence,
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});