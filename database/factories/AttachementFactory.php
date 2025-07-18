<?php

namespace Database\Factories;

use App\Models\Capsule;
use Illuminate\Database\Eloquent\Factories\Factory;


class AttachementFactory extends Factory
{
    public function definition(): array
    {
        $types = ['image', 'audio', 'video'];
        $fileType = $this->faker->randomElement($types);

        $extensions = [
            'image' => ['jpg', 'jpeg', 'png', 'gif'],
            'audio' => ['mp3', 'wav'],
            'video' => ['mp4', 'avi', 'mov']
        ];

        $ext = $this->faker->randomElement($extensions[$fileType]);

        return [
            'capsule_id' => Capsule::inRandomOrder()->first()?->id ?? Capsule::factory(),
            'file_type'  => $fileType,
            'file_url'   => $this->faker->url() . '/file-' . $this->faker->uuid . '.' . $ext,
        ];
    }
}
