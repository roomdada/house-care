<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
     public function definition()
    {
       return [
             'city' => $this->faker->randomElement($array = array('Abobo', 'Adjamé', 'Attécoubé', 'Cocody', 'Koumassi', 'Marcory', 'Port-Bouët', 'Treichville', 'Yopougon', 'Le Plateau')),
             'token' => Str::random(60),
             'price' => rand(200000,230000),
             'place' => rand(1,10),
             'image_1' => 'house.jpg',
             'image_2' => 'house.jpg',
             'image_3' => 'house.jpg',
             'image_4' => 'house.jpg',
             'description' => $this->faker->paragraphs(2),
             'user_id' => User::all()->random()->id,
        ];
    }
}
