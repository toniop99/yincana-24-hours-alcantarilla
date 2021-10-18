<?php

namespace App\Models;

use App\Services\BotApiService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\HasApiTokens;

class User implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    private BotApiService $botApiService;

    public string $id;
    public string $email;
    public string $name;
    public string $password;

    public function __construct(string $id, string $email, string $name, string $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }

    public function getAuthIdentifierName(): string
    {
        return "id";
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword(): string
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
