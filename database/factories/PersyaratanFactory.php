<?php

namespace Database\Factories;

use App\Models\Persyaratan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersyaratanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persyaratan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
