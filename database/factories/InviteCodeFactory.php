<?php

namespace Database\Factories;

use App\Models\InviteCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class InviteCodeFactory extends Factory
{
    protected $model = InviteCode::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->randomNumber(6),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
