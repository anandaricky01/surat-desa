<?php

namespace Database\Factories;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PengantarKTP>
 */
class PengantarKTPFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1,4),
            'status' => Arr::random(['acc', 'tidak acc', 'sedang diproses']),
            'scan_kk' => null,
            'keterangan' => $this->faker->word(),
        ];
    }
}
