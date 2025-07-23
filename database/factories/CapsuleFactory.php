<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capsule>
 */
class CapsuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('en_US');
        return [
            'user_id' => User::factory(),
            'title' => $faker->randomElement([
                'Future Letter',
                'Time Capsule',
                'Message to Me',
                'Dear Tomorrow',
                'My Memory',
                'Hidden Note',
                'To the Future',
                'Secret Thoughts',
                'One Day',
                'Next Chapter'
            ]),

            'message' => $faker->realText(200),
            'reveal_date' => $faker->dateTimeBetween('+1 day', '+2 years'),
            'country' => $faker->country(),
            'mood' => $faker->randomElement([
                'Happy',
                'Sad',
                'Excited',
                'Angry',
                'Anxious',
                'Grateful',
                'Nostalgic',
                'Romantic',
                'Lonely',
                'Peaceful',
                'Confident',
                'Hopeful',
                'Embarrassed',
                'Curious',
                'Inspired',
                'Bored',
                'Surprised',
                'Tired',
                'Determined',
                'Calm'
            ]),
            'tag' => implode(', ', $faker->randomElements([
                'love',
                'future',
                'dreams',
                'memory',
                'hope',
                'friendship',
                'journey',
                'secret',
                'travel',
                'growth'
            ], 3)),
            'privacy' => $faker->randomElement(['public', 'private', 'unlisted']),
            'is_surprise' => $faker->boolean(),
            'is_activated' => false,

        ];
    }
}
