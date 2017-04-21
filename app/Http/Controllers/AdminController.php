<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class AdminController extends Controller
{
    public function autoLogin(Request $request)
    {
        if(!$request->session()->has('pwd') || $request->session()->get('pwd') != env('ADMIN_KEY'))
            return view('/admin/login');
        else
            return view('/admin/index');
    }
    public function login(Request $request)
    {
        if($request->input('pwd') == env('ADMIN_KEY'))
        {
            $request->session()->put('pwd', env('ADMIN_KEY'));
            return redirect('/admin/index');
        }
        else
        {
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
            'questions' => $questions
        ]);
    }
}
