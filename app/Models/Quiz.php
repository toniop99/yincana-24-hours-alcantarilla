<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use Uuids, HasFactory;

    protected $fillable = [
        'store',
        'map_url',
        'question_number',
        'title',
        'question',
        'answer_1',
        'answer_2',
        'answer_3',
        'correct_answer',
    ];
}
