<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    protected $model = Room::class;
    private static $roomNo = 201; // Initialize the starting room number
    public function definition(): array
    {
        $roomNoOfPatients = $this->faker->numberBetween(0, 10);
        if ($roomNoOfPatients === 0) {
            $roomStatus = 1;
        } else if ($roomNoOfPatients === 10) {
            $roomStatus = 3;
        } else {
            $roomStatus = 2;
        }
        $createdAt = $this->faker->dateTime();
        $updatedAt = $this->faker->dateTimeBetween($createdAt, 'now');
        return [
            'room_no' => self::$roomNo++, // Increment the room number for each row
            'room_status' => $roomStatus, // Set room_status based on room_no_of_patients
            'room_no_of_patients' => $roomNoOfPatients, // Random number of patients (0 to 10)
            'room_price' => $this->faker->randomFloat(2, 100, 2_000), // Random room price between 50 and 200 with 2 decimal places
            'del_flg' => $this->faker->randomElement([0, 1])->default(1), // Random delete flag (0 or 1)
            'created_at' => $createdAt, // Random created_at timestamp
            'updated_at' => $updatedAt, // Random updated_at timestamp not earlier than created_at
        ];
    }
}
