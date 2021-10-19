<?php

namespace App\Providers;

use App\Models\User;
use App\Services\BotApiService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Validation\ValidationException;

class BotUserProvider implements UserProvider
{
    private BotApiService $botApiService;

    public function __construct(BotApiService $botApiService)
    {
        $this->botApiService = $botApiService;
    }

    public function retrieveById($identifier): ?User
    {
        $data = $this->botApiService->getUserById($identifier);
        $username = $data['telegram_username'] ?: $data['email'];

        return new User($data['id'], $data['email'], $username, $data['pin'], $data['basesAccepted']);

    }

    public function retrieveByCredentials(array $credentials): ?User
    {
        if (empty($credentials)) {
            return null;
        }

        $data = $this->botApiService->getUserByEmail($credentials['email']);

        $username = $data['telegram_username'] ?: $data['email'];
        return new User($data['id'], $data['email'], $username, $data['pin'], $data['basesAccepted']);
    }

    /**
     * @throws ValidationException
     */
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        if($credentials['password'] == $user->getAuthPassword()) {
            if(!$user->basesAccepted) {
                throw ValidationException::withMessages([
                    'error' => 'Debes aceptar las bases del concurso en Telegram con el comando /participate',
                ]);
            }
        }

        return ($credentials['email'] == $user->email &&
            ($credentials['password']) == $user->getAuthPassword());
    }

    public function retrieveByToken($identifier, $token){}

    public function updateRememberToken(Authenticatable $user, $token){}
}
