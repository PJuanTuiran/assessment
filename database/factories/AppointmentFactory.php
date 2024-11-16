<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        return [
            'patient_id' => 1,
            'doctor_id' => 2, // Si no hay doctor, usa el primer usuario
            'date_time' => $this->faker->dateTimeBetween('-1 years', '1 years'),
            'status' => $this->faker->randomElement(['pendiente', 'confirmada', 'cancelada', 'completada']),
            'reason' => $this->faker->sentence(),
            'notes' => $this->faker->paragraph(),
        ];
    }
}
