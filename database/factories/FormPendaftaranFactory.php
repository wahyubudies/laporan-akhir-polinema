<?php

namespace Database\Factories;

use App\Models\FormPendaftaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormPendaftaranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormPendaftaran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim_mhs_1' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'nama_mhs_1' => $this->faker->name(),
            'nim_mhs_2' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),            
            'nama_mhs_2' => $this->faker->name(),
            'judul' => $this->faker->word(),
            'dosen_penyeleksi_1' => $this->faker->name(),            
            'dosen_penyeleksi_2' => $this->faker->name(),            
            'dosen_penyeleksi_3' => $this->faker->name(),          
            'file_upload' => $this->faker->name()
        ];
    }
}
