<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\Admin;
use App\Eloquent\User;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'username' => $faker->email,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'type' => 'admin',
    ];
});
