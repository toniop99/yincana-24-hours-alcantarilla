<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Services\BotApiService;
use App\Services\QuizService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    private QuizService $quizService;
    private BotApiService $botApiService;

    public function __construct(QuizService $quizService, BotApiService $botApiService)
    {
        $this->quizService = $quizService;
        $this->botApiService = $botApiService;
    }

    public function loadQuestion(string $id) {
        $quizQuestion = $this->quizService->findById($id);
        $userQuiz = $this->botApiService->getUserQuiz(Auth::user()->id);

        if(!$quizQuestion) {
            // Return not found view
            return view('error', ['message' => __('pages.quiz.not-found')]);
        }

        if(!$userQuiz || !$userQuiz['accept_bases']) {
            return view('error', ['error' => 'Telegram 24h', 'message' => __('pages.quiz.not-accepted-bases')]);
        }

        if($userQuiz['questions'][$quizQuestion->question_number] !== null) {
            return view('error', ['error' => 'Pregunta ya respondida', 'message' => __('pages.quiz.already_answered')]);
        }



        return view('quiz.question', ['question' => $quizQuestion]);
    }

    public function validateAnswer(string $id, Request $request) {
        $quizQuestion = $this->quizService->findById($id);
        $userQuiz = $this->botApiService->getUserQuiz(Auth::user()->id);
        $questions = $this->quizService->all();

        $correctAnswer = $quizQuestion->correct_answer;

        if(!$userQuiz || !$userQuiz['accept_bases']) {
            return view('error', ['error' => 'Telegram 24h', 'message' => __('pages.quiz.not-accepted-bases')]);
        }

        if($userQuiz['questions'][$quizQuestion->question_number] !== null) {
            return view('error', ['error' => 'Pregunta ya respondida', 'message' => __('pages.quiz.already_answered')]);
        }

        if(!$quizQuestion) {
            return view('error', ['message' => __('general.error')]);
        }

        if ($request->answer === $quizQuestion->{$correctAnswer}) {
            // correct answer and valid, save to the user the correct answer and return success message
            $result = $this->botApiService->storeUserQuizAnswer(Auth::user()->id, $quizQuestion->question_number, true);

            if(!$result) {
                return view('error', ['message' => __('general.error')]);
            }
            $response = [];
            $userQuiz = $this->botApiService->getUserQuiz(Auth::user()->id);
            $response = $this->quizService->parseProfileData($userQuiz, $questions);
            return view('dashboard', ['correctAnswer' => true, 'quizData' => $response]);
        }

        // incorrect answer, save and return incorrect message.
        $result = $this->botApiService->storeUserQuizAnswer(Auth::user()->id, $quizQuestion->question_number, false);

        if(!$result) {
            return view('error', ['message' => __('general.error')]);
        }

        $response = [];
        $userQuiz = $this->botApiService->getUserQuiz(Auth::user()->id);
        $response = $this->quizService->parseProfileData($userQuiz, $questions);
        return view('dashboard', ['correctAnswer' => false, 'quizData' => $response]);
    }
}
