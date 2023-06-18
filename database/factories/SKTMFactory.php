<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SKTM>
 */
class SKTMFactory extends Factory
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
            'status' => Arr::random(['acc', 'tidak acc', 'sedang diproses']),
            'scan_kk' => null,
            'scan_ktp' => null,
            'keterangan' => $this->faker->word(),
        ];
    }
}
