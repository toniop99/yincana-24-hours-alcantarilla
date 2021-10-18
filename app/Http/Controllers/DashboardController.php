<?php

namespace App\Http\Controllers;

use App\Services\BotApiService;
use App\Services\QuizService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    private BotApiService $botApiService;

    private QuizService $quizService;

    public function __construct(BotApiService $botApiService, QuizService $quizService)
    {
        $this->botApiService = $botApiService;
        $this->quizService = $quizService;
    }

    public function index() {
        $userId = Auth::user()->id;
        $userQuiz = $this->botApiService->getUserQuiz($userId);
        $questions = $this->quizService->all();
        $response = [];

        if(!$userQuiz || !$userQuiz['accept_bases']) {
            return view('error', ['error' => 'Telegram 24h', 'message' => __('pages.quiz.not-accepted-bases')]);
        }

        $response = $this->quizService->parseProfileData($userQuiz, $questions);

        return view('dashboard', ['quizData' => $response]);
    }
}
