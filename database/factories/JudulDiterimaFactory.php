<?php

namespace Database\Factories;

use App\Models\JudulDiterima;
use Illuminate\Database\Eloquent\Factories\Factory;

class JudulDiterimaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JudulDiterima::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nim' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'kelas' => $this->faker->word(),
            'judul' => $this->faker->sentence()
        ];
    }
}
