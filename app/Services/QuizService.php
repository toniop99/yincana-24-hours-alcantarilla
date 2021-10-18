<?php

namespace App\Services;

use App\Repositories\QuizRepository;
use Ramsey\Collection\Collection;

class QuizService
{

    private QuizRepository $repository;

    public function __construct()
    {
        $this->repository = new QuizRepository();
    }

    public function all() {
        return $this->repository->all();
    }

    public function allIds(): array
    {
        $questions = $this->all();
        $return = [];

        foreach ($questions as $question) {
            $return[] = $question->id;
        }

        return $return;
    }

    public function findById(string $id) {
        return $this->repository->findById($id);
    }

    public function parseProfileData(array $userQuiz, $questions): array
    {
        $response = [];
        $failed = 0;
        $correct = 0;
        $noResponse = 0;
        foreach ($questions as $question) {
            if($userQuiz['questions'][$question->question_number] === true) {
                $correct++;
            }
            if($userQuiz['questions'][$question->question_number] === false) {
                $failed++;
            }
            if($userQuiz['questions'][$question->question_number] === null) {
                $noResponse++;
            }
            $response['questions'][] = [
                'question_number' => $question->question_number,
                'store' => $question->store,
                'store_url' => $question->map_url,
                'status' => $userQuiz['questions'][$question->question_number],
            ];
        }
        $response['correct'] = $correct;
        $response['failed'] = $failed;
        $response['noResponse'] = $noResponse;

        $questionsNumber = array_column($response['questions'], 'question_number');
        array_multisort($questionsNumber, SORT_ASC, $response['questions']);

        return $response;
    }
}
