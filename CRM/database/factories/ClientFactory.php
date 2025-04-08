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
            'name' => fake()->company(),
            'vat' => fake()->unique()->numerify('#######'),
            'address' => fake()->address(),
        ];
    }

}
