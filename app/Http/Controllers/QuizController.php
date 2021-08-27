<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
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
}
