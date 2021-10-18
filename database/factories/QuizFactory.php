<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'store' => $this->faker->name(),
            'question_number' => 'q1',
            'title' => $this->faker->name(),
            'question' => $this->faker->text(100),
            'answer_1' => $this->faker->text(50),
            'answer_2' => $this->faker->text(50),
            'answer_3' => $this->faker->text(50),
            'correct_answer' => 'answer_3',
        ];
    }
}
