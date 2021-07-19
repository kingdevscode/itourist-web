<?php

namespace Database\Factories;


use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VilleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ville::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => Str::random(10),
            'user_id' => User::factory(),
        ];
    }
}
