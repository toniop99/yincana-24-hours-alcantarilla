<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class BotApiService
{
    private string $api_url;

    public function __construct()
    {
        if(App::environment('local')) {
            $this->api_url = 'http://localhost:3000';
        } else {
            $this->api_url = env('bot_api_url', 'https://www.alcantarilla24bot.tk');
        }
    }

    /**
     * @throws Exception
     */
    public function validateUser(string $email, string $pin) {
        $response = Http::post($this->api_url.'/api/validate-user', ['email' => $email, 'pin' => $pin]);
        $data = $response->json()['data'];

        if (!$data['user']) {
            if($data['code'] === 'user.not.found') {
                throw ValidationException::withMessages([__('auth.user-not-found')]);
            } else if($data['code'] === 'pin.not.valid') {
                throw ValidationException::withMessages([
                    'email' => __('auth.failed'),
                ]);
            } else {
                throw ValidationException::withMessages([__('general.error')]);
            }
        }

        return $data;
    }

    public function getUserById(string $id) {
        $endpoint = $this->api_url.'/api/user';

        $response = Http::post($endpoint, ['id' => $id]);

        if(!$response->json()) {
            return null;
        }

        $data = $response->json()['data'];

        if(!is_null($data['user'])) {
            return $data['user'];
        }

        return null;
    }

    public function getUserByEmail(string $email) {
        $endpoint = $this->api_url.'/api/user';

        $response = Http::post($endpoint, ['email' => $email]);

        if(!$response->json()) {
            return null;
        }

        $data = $response->json()['data'];

        if(!is_null($data['user'])) {
            return $data['user'];
        }

        return null;
    }

    public function getUserQuiz(string $id) {
        $endpoint = $this->api_url.'/api/quiz-user';

        $response = Http::post($endpoint, ['id' => $id]);

        if(!$response->json()) {
            return null;
        }

        $data = $response->json()['data'];

        if(!is_null($data['userQuiz'])) {
            return $data['userQuiz'];
        }

        return null;
    }

    public function storeUserQuizAnswer(string $userId, string $question, bool $result) {
        $endpoint = $this->api_url.'/api/answer';

        $response = Http::post($endpoint, ['userId' => $userId, 'question' => [$question => $result]]);

        if(!$response->json()) {
            return null;
        }

        $data = $response->json()['data'];

        if(!is_null($data['userQuiz'])) {
            return $data['userQuiz'];
        }

        return null;
    }
}
