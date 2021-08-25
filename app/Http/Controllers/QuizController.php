<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizStoreRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\Quiz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class QuizController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Quiz/Index',
            [
                'quizzes' => Quiz::all(),
            ]);
    }

    public function edit(Quiz $quiz): Response
    {
        $quiz->load('questions.answers');
        return Inertia::render('Admin/Quiz/Edit', [
            'quiz' => [
                'id' => $quiz->id,
                'title' => $quiz->title,
                'info' => $quiz->info,
                'questions' => $quiz->questions,
            ]
        ]);
    }

    public function store(QuizStoreRequest $request): RedirectResponse
    {
        $quiz = Quiz::create([
            'title' => $request->get('title'),
            'info' => '',
        ]);

        Redirect::route('admin.quiz.edit', [$quiz]);

        return redirect()->route('admin.quiz.edit', ['quiz' => $quiz]);
    }

    public function update(UpdateQuizRequest $request, Quiz $quiz): JsonResponse
    {
        $quiz->update($request->validated());

        return new JsonResponse(['status' => 'ok', 200]);
    }
}
