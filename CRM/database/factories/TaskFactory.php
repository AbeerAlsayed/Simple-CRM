<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * تعريف النموذج المرتبط بالفاكتوري.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * تعريف القيم التي سيتم إنشاءها بواسطة الفاكتوري.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word, // توليد عنوان المهمة
            'description' => $this->faker->sentence, // توليد وصف المهمة
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year'), // توليد تاريخ استحقاق عشوائي
            'user_id' => User::factory(), // ربط المهمة بمستخدم باستخدام فاكتوري للمستخدم
            'project_id' => Project::factory(), // ربط المهمة بمشروع باستخدام فاكتوري للمشروع
            'status' => $this->faker->randomElement(['pending', 'completed', 'in_progress']), // حالة المهمة
        ];
    }
}
