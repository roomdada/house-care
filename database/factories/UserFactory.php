<?php

namespace Database\Factories;

use App\Domain\City\City;
use App\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       return [
                'firstname' => $this->faker->firstName($gender = 'male'|'female'),
                'lastname' => $this->faker->lastName,
                'email' => $this->faker->unique()->email,
                'password' => $this->faker->sha1,
                'matricule' => 'hc-'.rand(1,100)."-2021",
                'identity' => "carte_identity.png",
                'compagny' => $this->faker->company,
                'phone_1' => $this->faker->randomNumber($nbDigits = 8, $strict = false) ,
                'phone_2' => $this->faker->randomNumber($nbDigits = 8, $strict = false) ,
                'phone_3' => $this->faker->randomNumber($nbDigits = 8, $strict = false) ,
                'city' => City::all()->random()->id,
                'validation' => 1,
                'admin_validation' => 1,
                'inline' => 1,
                'token'=>Str::random(60),
                'genre'=> $this->faker->randomElement(),
                'birthday'=>$this->faker->date,
                'role_id'=>Role::all()->random()->id,
        ];
    }
}
