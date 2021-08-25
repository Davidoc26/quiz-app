<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $question = Question::create([
            'correct_answer_id' => 1,
            'quiz_id' => $request->get('quiz_id'),
            'question' => $request->get('question'),
        ]);

        $answer = $question->answers()->create([
            'question_id' => $question->id,
            'order' => 1,
            'text' => '',
        ]);

        $question->update(['correct_answer_id' => $answer->id]);

        $question->load('answers');

        return new JsonResponse($question);
    }

    public function update(Request $request, Question $question): JsonResponse
    {
        $question->update(['correct_answer_id' => $request->get('correct_answer_id')]);

        return new JsonResponse(['status' => 'ok'], 200);
    }
}
