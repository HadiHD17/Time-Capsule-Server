<?php

namespace Database\Factories;

use App\Models\Capsule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachement>
 */
class AttachementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'capsule_id' => Capsule::factory(),
            'file_name' => $this->faker->lexify('file_????') . '.' . $this->faker->fileExtension(),
        ];
    }
}
