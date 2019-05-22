<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Eloquent\Admin;
use App\Eloquent\User;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'username' => $faker->email,
        'password' => '$2y$10$8kioeuZKOlHkEAl6Gh5gpeYNoIOdj9gvFLLJesrcDBVySVMUxE86a', // stemapp
        'type' => 'admin',
    ];
});
