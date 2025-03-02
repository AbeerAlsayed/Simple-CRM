<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserFactory extends Factory
{
    /**
     * تعريف النموذج المرتبط بالفاكتوري.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * تعريف القيم التي سيتم إنشاءها بواسطة الفاكتوري.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // يمكنك تعديل هذا حسب الحاجة
            'role' => $this->faker->randomElement(['admin', 'user', 'manager']), // يمكنك تخصيص الأدوار
            'email_verified_at' => now(),
            // تخصيص أي حقول إضافية هنا مثل الصورة أو حقول أخرى
        ];
    }

    /**
     * حالة لإنشاء مستخدم بصلاحيات معينة.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withRole($role = 'user')
    {
        return $this->state(function (array $attributes) use ($role) {
            return [
                'role' => $role,
            ];
        });
    }

    /**
     * حالة لإنشاء مستخدم مع صورة.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withImage()
    {
        return $this->afterCreating(function (User $user) {
            // إذا كنت تستخدم مكتبة Spatie Media، يمكنك إضافة صورة هنا
            $user->addImage($this->faker->imageUrl());
        });
    }
}
