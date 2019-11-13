<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Noticia::class, function (Faker $faker) {
    $titulo = $faker->sentence(4);
    return [
        //
        'titulo' => $titulo,
        'body' => $faker->text(500),
        'img' => $faker->imageUrl($width = 1200, $height=400),
        'slug' => str_slug($titulo),
        'estado' => $faker->randomElement(['BORRADOR', 'PUBLICADO'])
    ];
});
