<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Categoria::class, function (Faker $faker) {
    $titulo = $faker->sentence(4);
    return [
        //
        'nombre' => $titulo,
        'slug' => str_slug($titulo)
    ];
});
