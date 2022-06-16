<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "job_id" => Job::factory(),
            "question" => $this->faker->sentence(4, true),
            "option1" => $this->faker->words(3,true),
            "option2" => $this->faker->words(3,true),
            "option3" => $this->faker->words(3,true),
            "option4" => $this->faker->words(3,true),
            "correct_answer" => $this->faker->randomElement(["option1","option2","option3","option4"]),
        ];
    }
}
