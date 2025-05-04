<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * تعريف النموذج المرتبط بالفاكتوري.
     *
     * @var string
     */
    protected $model = Client::class;


    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->companyEmail(),
            'phone' => $this->faker->phoneNumber(),
            'vat' => $this->faker->unique()->numberBetween(1000, 99999),
            'address' => $this->faker->address(),
            'is_active' => $this->faker->boolean(90), // 90% chance of being active
        ];
    }

}
