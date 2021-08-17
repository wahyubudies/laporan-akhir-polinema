<?php

namespace Database\Factories;

use App\Models\DataLogbook;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataLogbookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataLogbook::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->word(),
            'dospem1' => $this->faker->name('female'),
            'dospem2' => $this->faker->name('male'),
            'user_id' => 2,
        ];
    }
}
