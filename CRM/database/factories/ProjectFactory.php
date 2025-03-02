<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * تعريف النموذج المرتبط بالفاكتوري.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * تعريف القيم التي سيتم إنشاءها بواسطة الفاكتوري.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word, // توليد عنوان المشروع
            'description' => $this->faker->sentence, // توليد وصف المشروع
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'), // توليد موعد نهائي عشوائي
            'user_id' => User::factory(), // ربط المشروع بمستخدم باستخدام فاكتوري للمستخدم
            'client_id' => Client::factory(), // ربط المشروع بعميل باستخدام فاكتوري للعميل
            'status' => $this->faker->randomElement(['pending', 'completed', 'in_progress']), // حالة المشروع
        ];
    }

    /**
     * حالة لإنشاء مشروع مع مهام مرتبطة.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withTasks($count = 3)
    {
        return $this->afterCreating(function (Project $project) use ($count) {
            // إنشاء مهام مرتبطة بالمشروع
            $project->tasks()->createMany(
                \App\Models\Task::factory()->count($count)->make()->toArray()
            );
        });
    }
}
