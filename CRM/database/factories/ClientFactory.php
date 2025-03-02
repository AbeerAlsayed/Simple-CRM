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

    /**
     * تعريف القيم التي سيتم إنشاءها بواسطة الفاكتوري.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company, // توليد اسم شركة وهمي
            'vat' => $this->faker->vat, // توليد رقم ضريبي وهمي
            'address' => $this->faker->address, // توليد عنوان وهمي
        ];
    }

    /**
     * حالة لإنشاء عميل مع مشاريع.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withProjects($count = 1)
    {
        return $this->afterCreating(function (Client $client) use ($count) {
            // إنشاء مشاريع مرتبطة بالعميل
            Project::factory()->count($count)->create([
                'client_id' => $client->id,
            ]);
        });
    }
}
