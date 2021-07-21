<?php

namespace Database\Factories;

use App\Models\RekapLaporan;
use Illuminate\Database\Eloquent\Factories\Factory;

class RekapLaporanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RekapLaporan::class;

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
            'link_drive' => $this->faker->url(),
        ];
    }
}
