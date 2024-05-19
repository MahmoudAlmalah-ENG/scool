<?php

namespace Database\Factories;

use App\Enum\WorkshopEnum;
use App\Models\Workshop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WorkshopFactory extends Factory
{
    protected $model = Workshop::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'icon' => $this->faker->word(),
            'start_at' => Carbon::now()->format('Y-m-d'),
            'end_at' => Carbon::now()->addDays(1)->format('Y-m-d'),
            'status' => $this->faker->randomElement(WorkshopEnum::toArray()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
