<?php

namespace Database\Factories;

use App\Models\FormUpload;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormUploadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormUpload::class;

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
            'dosen_pmb_1' => $this->faker->name(),            
            'dosen_pmb_2' => $this->faker->name(),            
            'dosen_pgj_1' => $this->faker->name(),            
            'dosen_pgj_2' => $this->faker->name(),            
            'file_upload' => $this->faker->name()
        ];
    }
}
