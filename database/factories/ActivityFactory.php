<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Periodo;
use Illuminate\Support\Str;
use App\Models\Activity;
use App\Models\Status;


class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    protected $model = Activity::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(20),
            'date_ini'=>$this->faker->date('Y-m-d'),
            'date_fin'=>$this->faker->date('Y-m-d'),
            'id_user' => User::all()->random()->id,
            'id_status' => $this->faker->randomElement([1,2]),
            'id_periodo' => Periodo::all()->random()->id,
            
        ];
    }
}
