<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAnswerTextRequest;
use App\Models\Answer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $answer = Answer::create([
            'question_id' => $request->get('question_id'),
            'text' => $request->get('text'),
            'order' => $request->get('order'),
        ]);

        return new JsonResponse($answer);
    }

    public function updateText(UpdateAnswerTextRequest $request, Answer $answer): JsonResponse
    {
        $answer->update($request->validated());

        return new JsonResponse(['status' => 'ok', 200]);
    }

    public function updateOrder(Request $request): JsonResponse
    {
        foreach ($request->get('answers') as $answer) {
            Answer::find($answer['id'])->update(['order' => $answer['order']]);
        }

        return new JsonResponse(['status' => 'ok'], 200);
    }
}
