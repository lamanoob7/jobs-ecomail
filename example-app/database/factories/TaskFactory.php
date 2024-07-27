<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    const MAX_DAYS = 7;
    const MAX_HOURS = self::MAX_DAYS * 24;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'priority' => rand(0, 15),
            'target_date' => $this->getDateInFuture(self::MAX_HOURS),
            'finished_at' => (rand(1,3) % 1) ? null : $this->getDateInPast(self::MAX_HOURS),
        ];
    }

    private function getDateInFuture(int $maxHours) : Carbon {
        return now()->add('hour', rand(1, $maxHours));
    }

    private function getDateInPast(int $maxHours) : Carbon {
        return now()->sub('hour', rand(1, $maxHours));
    }
}
