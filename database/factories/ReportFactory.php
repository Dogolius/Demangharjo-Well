<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'body' => collect($this->faker->paragraphs(5,10))->map(fn($p)=> "<p>$p</p/")->implode(''),
        ];
    }
}
