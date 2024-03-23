<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => mt_rand(100, 999),
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'tanggal_lahir' => fake()->date(),
            'gender' => fake()->randomElement(['laki-laki', 'perempuan']),
            'usia' => fake()->numberBetween(18, 25)
        ];
    }
}
