<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function show(User $user): Response
    {
        $user->load('completedQuizzes.quiz');

        return Inertia::render('User/Show', [
            'user' => $user,
            'completedQuizzes' => $user->completedQuizzes,
            'completedQuizzesCount' => $user->completedQuizzes->count(),
        ]);
    }
}
