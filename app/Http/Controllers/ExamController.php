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
        if ($count > $total)
            return response(500);
        $indexes = array();
        for ($i = 0; $i < $total; $i++)
            $indexes[] = $i;
        shuffle($indexes);
        $questions = array();
        $answers = array();
        for ($i = 0; $i < $count; $i++) {
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
        if (env('ENABLE_EXAM') == 'false')
            return response("报名已结束");
        else {
            $data = $this->getRandomQuestions(15);
            $request->session()->put('answers', json_encode($data['answers']));
            $request->session()->put('start_time', time());
            $request->session()->put('exam_type', 'single');
            return view('exam', [
                'timeLimit' => 600,
                'total' => count($data['questions']),
                'questions' => $data['questions']
            ]);
        }
    }

    public function startTeamExam(Request $request)
    {
        if (env('ENABLE_EXAM') == 'false')
            return response("报名已结束");
        else {
            $data = $this->getRandomQuestions(30);
            $request->session()->put('answers', json_encode($data['answers']));
            $request->session()->put('start_time', time());
            $request->session()->put('exam_type', 'team');
            return view('exam', [
                'timeLimit' => 600,
                'total' => count($data['questions']),
                'questions' => $data['questions']
            ]);
        }
    }

    public function judge(Request $request)
    {
        if (!$request->session()->has('exam_type'))
            return response('Access denied.');
        if (strtotime('610 seconds', $request->session()->get('start_time')) < time())
            return response('超过时间限制，请重试！');
        $answers = json_decode($request->session()->get('answers'));
        $total = $request->session()->get('exam_type') == 'single' ? 15 : 30;
        $score = 0;
        //$debug = '';
        for ($i = 0; $i < $total; $i++) {
            //$debug .= $i . ' answer=' . $answers[$i] . '  choice=' . $request->input('question' . strval($i + 1)) .'<br/>';
            if ($answers[$i] == $request->input('question' . strval($i + 1)))
                $score++;
        }
        //Set judge status
        switch ($request->session()->get('exam_type')) {
            case 'single':
                if ($score >= 10)
                    $request->session()->put('judge_status', true);
                break;
            case 'team':
                if ($score >= 20)
                    $request->session()->put('judge_status', true);
                break;
        }
        //Clean sessions
        $request->session()->forget('answers');
        $request->session()->forget('start_time');
        if ($request->session()->get('judge_status'))
            return view('register', [
                'score' => $score,
                'exam_type' => $request->session()->get('exam_type')
            ]);
        else
            return view('thanks', [
                'score' => $score
            ]);
    }
}
