<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\RefrensiTema;
use Illuminate\Database\Eloquent\Factories\Factory;

class RefrensiTemaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RefrensiTema::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dosen = Dosen::find(9);
        return [
            'tema' => $this->faker->sentence(),
            'dosen_id' => $dosen->id
        ];
    }
}
