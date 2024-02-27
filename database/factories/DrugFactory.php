<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drug>
 */
class DrugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = $this->faker->dateTime();
        $updatedAt = $this->faker->dateTimeBetween($createdAt, 'now');
        return [
            //
            'drug_name' => $this->faker->word(),
            'drug_amt' => $this->faker->numberBetween(0, 9_999),
            'drug_amt_unit' => $this->faker->randomElement([1, 2]),
            'drug_stock' => $this->faker->numberBetween(0, 999_999),
            'drug_price' => $this->faker->randomFloat(2, 100, 100_000), // Random room price between 50 and 200 with 2 decimal places
            'del_flg' => $this->faker->randomElement([0, 1])->default(1), // Random delete flag (0 or 1)
            'created_at' => $createdAt, // Random created_at timestamp
            'updated_at' => $updatedAt, // Random updated_at timestamp not earlier than created_at
        ];
    }
}
