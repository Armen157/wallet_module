<?php

namespace Database\Factories;

use App\Models\UserWallets;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserWalletsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserWallets::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->name(),
            'type' => "Credit",
        ];
    }
}
