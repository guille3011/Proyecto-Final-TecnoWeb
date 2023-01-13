<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PeriodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'finicio'=>$this->faker->date('Y-m-d'),
            'ffin'=>$this->faker->date('Y-m-d'),
            'descripcion' => $this->faker->text(20),
            
        ];
    }
}
