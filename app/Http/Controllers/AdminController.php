<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Student;
use App\Team;

class AdminController extends Controller
{
    public function autoLogin(Request $request)
    {
        if (!$request->session()->has('pwd') || $request->session()->get('pwd') != env('ADMIN_KEY'))
            return view('/admin/login');
        else
            return view('/admin/index');
    }

    public function login(Request $request)
    {
        if ($request->input('pwd') == env('ADMIN_KEY')) {
            $request->session()->put('pwd', env('ADMIN_KEY'));
            return redirect('/admin/index');
        } else {
            return redirect('/admin/login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('pwd');
        return redirect('/admin');
    }

    public function showQuestion(Request $request)
    {
        $qs = Question::all();
        $count1 = Question::where('type', 1)->count();
        $count2 = Question::where('type', 2)->count();
        $count3 = Question::where('type', 3)->count();
        $questions = array();
        foreach ($qs as $q) {
            $fq = $q->getFormatted();
            $question['content'] = $fq['content'];
            $question['choices'] = $fq['choices'];
            $question['answer'] = $q->answer;
            $question['type'] = $fq['type'];
            $questions[] = $question;
        }
        return view('admin.showQuestion', [
            'questions' => $questions,
            'count' => [$count1, $count2, $count3]
        ]);
    }

    public function adjustTeam(Request $request)
    {
        $nh = config('school.nanhu');
        $hn = config('school.hunnan');
        $teams = Team::all();
        $cnt1 = 0;
        $cnt2 = 0;
        $adj1 = array();
        $adj2 = array();
        foreach ($teams as $team) {
            if ($team->count == 2) {
                $students = $team->students()->get();
                if (in_array($students[0]->school, $nh) && in_array($students[1]->school, $hn)) {
                    ++$cnt1;
                    $adj1[] = $team;
                } else if (in_array($students[0]->school, $hn) && in_array($students[1]->school, $nh)) {
                    ++$cnt2;
                    $adj2[] = $team;
                }
            }
        }
        // Perform adjust
        for ($i = 0; $i < min(count($adj1), count($adj2)); ++$i) {
            $s1 = $adj1[$i]->students()->get();
            $s2 = $adj2[$i]->students()->get();
            $s1[0]->team_id = $adj2[$i]->id;
            $s2[0]->team_id = $adj1[$i]->id;
            $s1[0]->save();
            $s2[0]->save();
        }
        return response('调整完成，调试信息如下：<br/>' . json_encode($adj1) . '<br/>' . json_encode($adj2));
    }
}
