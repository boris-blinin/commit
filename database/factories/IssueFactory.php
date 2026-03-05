<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $issueDate = $this->faker->dateTimeBetween('-6 months', 'now');

        return [
            'employee_id' => Employee::inRandomOrder()->first()->id,
            'item_id' => Item::inRandomOrder()->first()->id,
            'issue_date' => $issueDate,
            'return_date' => $this->faker->optional()->dateTimeBetween($issueDate, 'now'),
            'quantity' => $this->faker->numberBetween(1, 3),
        ];
    }
}
