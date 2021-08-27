<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Application',
            [
                'quizzes' => Quiz::all(),
            ]);
    }
}
