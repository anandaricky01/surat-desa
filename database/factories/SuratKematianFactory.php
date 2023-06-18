<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuratKematian>
 */
class SuratKematianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'name' => $this->faker->name,
            'tanggal_meninggal' => $this->faker->date,
            'no_kk' => $this->faker->numerify('##########'),
            'nik' => $this->faker->numerify('################'),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'umur' => $this->faker->numberBetween(1, 100),
            'tempat_meninggal' => $this->faker->city,
            'sebab_meninggal' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['acc', 'tidak acc', 'sedang diproses']),
            'scan_ktp' => null,
        ];
    }
}
