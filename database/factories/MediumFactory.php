<?php

namespace Database\Factories;

use App\Models\Medium;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediumFactory extends Factory
{
    protected $model = Medium::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        // Randomly decide media type
        $mediaType = $this->faker->randomElement(['Image', 'Voice']);
        
        return [
            'media_type' => $mediaType,
            'media_url'  => $mediaType === 'Image' ? $this->faker->imageUrl(640, 480, 'education') : $this->faker->url,
            'upload_date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
    }
}