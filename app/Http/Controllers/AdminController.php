<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class AdminController extends Controller
{
    public function showQuestion(Request $request)
    {
        $qs = Question::all();
        $questions = array();
        foreach ($qs as $q)
        {
            $fq = $q->getFormatted();
            $question['content'] = $fq['content'];
            $question['choices'] = $fq['choices'];
            $question['answer'] = $q->answer;
            $questions[] = $question;
        }
        return view('admin.showQuestion', [
            'total' => count($qs),
            'questions' => $questions
        ]);
    }
}
