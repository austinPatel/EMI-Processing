<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoanDetails>
 */
class LoanDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'num_of_payment' => $this->faker->numberBetween(1, 100),
            'first_payment_date' => $this->faker->date('Y-m-d', 'now'),
            'last_payment_date' => $this->faker->date('Y-m-d', '+1 year'),
            'loan_amount' => $this->faker->randomFloat(2, 1000, 100000),
        ];

    }
}
