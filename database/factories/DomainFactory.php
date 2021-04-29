<?php

namespace Database\Factories;

use App\Models\Domain;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DomainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Domain::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'domain' => $this->faker->domainWord,
            'name' => $this->faker->sentence,
            'status' => 0
        ];
    }

    public function no()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => false,
            ];
        });
    }

    public function yes()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => true,
            ];
        });
    }
}
