<?php

namespace App\Repositories;

use App\Models\Quiz;

final class QuizRepository
{
    private Quiz $model;

    public function __construct()
    {
        $this->model = new Quiz();
    }

    public function all() {
        return $this->model::query()->get();
    }

    public function findById(string $id) {
        $query = $this->model::query();

        $query->where('id', $id);

        return $query->get()->first();
    }

    public function findByCode(string $code) {
        $query = $this->model::query();

        $query->where('code', $code);

        return $query->get()->first();
    }

}
