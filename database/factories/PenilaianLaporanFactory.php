<?php

namespace Database\Factories;

use App\Models\PenilaianLaporan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenilaianLaporanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PenilaianLaporan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->word(),
            'dosen_pembimbing_1' => $this->faker->name(),
            'dosen_pembimbing_2' => $this->faker->name(),
            'nilai_dospem_1' => $this->faker->numberBetween($min = 0, $max = 100),
            'nilai_dospem_2' => $this->faker->numberBetween($min = 0, $max = 100),
            'dosen_penguji_1' => $this->faker->name(),
            'dosen_penguji_2' => $this->faker->name(),
            'nilai_dospeng_1' => $this->faker->numberBetween($min = 0, $max = 100),
            'nilai_dospeng_2' => $this->faker->numberBetween($min = 0, $max = 100),
        ];
    }
}
