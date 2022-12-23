<?php

namespace Database\Factories\Accountings;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AccountReminderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = ['receivables', 'payables', 'monthly-expenses'];

        return [
            'type' => $types[rand(0, 2)],
            'title' => $this->faker->words(rand(2,4), true),
            'amount' => rand(850, 7250),
            'remarks' => $this->faker->sentence(),
            'reminder_date' => $this->faker->date('Y-m-d')
        ];
    }
}
