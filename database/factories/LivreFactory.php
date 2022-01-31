<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titre = $this->faker->sentence();
        return [
            //
            "titre" => $titre,
            "slug" => Str::slug($titre),
            "description" => $this->faker->paragraph,
            "auteur"=> $this->faker->name,
            "image" => $this->faker->image,
            "prix" => $this->faker->numberBetween($min = 100, $max = 900),
            //"old_price" => $faker->numberBetween($min = 100, $max = 900),
            "category"=> $this->faker->name,
            "inStock" => $this->faker->numberBetween($min = 1, $max = 10),
            "qte"=> $this->faker->numberBetween($min = 1, $max = 5),
            //"image" => $faker->imageUrl($width = 640, $height = 480),
            // "category_id" => $faker->numberBetween($min = 1, $max = 10)
        ];
    }
}
