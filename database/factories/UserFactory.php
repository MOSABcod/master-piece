<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Classes;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // تحديد الدور (طالب أو معلم)
        $role = $this->faker->randomElement([0, 1]); // 0: طالب, 1: معلم

        return [
            'name'        => $this->faker->name(), // اسم عشوائي
            'national_id' => $this->faker->unique()->numerify('############'), // رقم وطني فريد
            'password'    => Hash::make('password'), // كلمة مرور افتراضية
            'role' => $this->faker->randomElement(['student', 'teacher']),
            'age'         => $role === 0 ? $this->faker->numberBetween(6, 18) : null, // العمر للطلاب فقط
            'class_id'    => $role === 0 
                                ? (Classes::inRandomOrder()->first()->id ?? Classes::factory()->create()->id) 
                                : null, // المعلمين لا يحتاجون لفصل
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }
}
