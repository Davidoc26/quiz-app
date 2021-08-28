<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompletedQuizRequest;
use App\Models\CompletedQuiz;
use App\Models\Quiz;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;

class QuizController extends Controller
{
    public function show(Quiz $quiz): Response
    {
        return Inertia::render('Quiz/Pass', [
            'quiz' => $quiz->load('questions.answers'),
        ]);
    }

    public function store(StoreCompletedQuizRequest $request, Quiz $quiz): JsonResponse
    {
        CompletedQuiz::updateOrCreate([
            'user_id' => $request->user()->id,
            'quiz_id' => $quiz->id,
        ], [
            'correct_answers' => $request->get('correct'),
            'incorrect_answers' => $request->get('incorrect'),
        ]);

        return new JsonResponse(['status' => 'ok', 200]);
    }
}
