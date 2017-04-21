<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class ExamController extends Controller
{
    public function getRandomQuestions($count)
    {
        $qs = Question::all();
        $total = count($qs);
        if($count > $total)
            return response(500);
        $indexes = array();
        for($i = 0; $i < $total; $i++)
            $indexes[] = $i;
        shuffle($indexes);
        $questions = array();
        $answers = array();
        for($i = 0; $i < $count; $i++)
        {
            $questions[] = $qs[$indexes[$i]]->getFormatted();
            $answers[] = $qs[$indexes[$i]]->answer;
        }
        return array(
            'questions' => $questions,
            'answers' => $answers
        );
    }
    public function setTimestamp(Request $request)
    {
        $request->session()->put('start_time', time());
    }
    public function startSingleExam(Request $request)
    {
        $data = $this->getRandomQuestions(15);
        $request->session()->put('answers', json_encode($data['answers']));
        $request->session()->put('start_time', time());
        return view('exam', [
            'timeLimit' => 600,
            'total' => count($data['questions']),
            'questions' => $data['questions']
        ]);
    }
}
