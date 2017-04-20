<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$q = new Question();
        return json_encode($q->getFormatted('76.下列句子中划线成语使用正确的一项是（   ）     
A．初中生活快结束了，同学们面临分别，恋恋不舍，大家期望能萍水相逢在新的校园里。
B．令中外游客叹为观止的扬州漆器，用料讲究，色泽光润，造型优美，构思精巧，闻名遐迩。
C．朝鲜不顾世界各方坚决反对，再次进行核试验，在国际社会引起了强烈的轩然大波。
D．国外大面积爆发甲型H1N1流感疫情，这消息真是耸人听闻，大家一定要加强自我保护。'));*/
        $text = '1.请根据题中给出的成语解释或出处选择出最恰当的成语：本指蔺相如将和氏璧完好地自秦送回赵国。后比喻把原物完好地归还本人。
A.完璧归赵 B.久假不归 C.物归原主   

2.请根据题中给出的成语解释或出处选出正确的成语：指袭击敌人后方的据点以迫使进攻之敌撤退的战术（出处：史记·孙子吴起列传）。
A.声东击西 B.围魏救赵 C.左右逢源

3.请根据题中给出的成语解释或出处选择出最恰当的成语：出处：《左传·僖公二十三年》:晋楚治兵，遇于中原，其辟君三舍。
A.望而生畏 B.退避三舍 C.委曲求全

4.请根据题中给出的成语解释或出处选择出最恰当的成语：出处：《史记·平原君列传》记载:秦军围攻赵国都城邯郸，平原君去楚国求救，门下食客毛遂自动请求一同前去。到了楚国，毛遂挺身而出，陈述利害，楚王才派兵去救赵国。
A.自我吹嘘 B.毛遂自荐 C.自食其力

5.请根据题中给出的成语解释或出处选择出最恰当的成语：出处：《史记·廉颇蔺相如列传》:廉颇闻之，肉袒负荆，因宾客至蔺相如门谢罪。
A.引咎自责 B.兴师问罪 C.负荆请罪
';
        $text = trim($text);
        return json_encode(explode(PHP_EOL . PHP_EOL, $text));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('pwd') != env('ADMIN_KEY'))
            return response('Access denied.');
        else
        {
            $text = trim($request->input('questions'));
            if(strpos($text, "\r\n\r\n") !== false)
                $questions = explode("\r\n\r\n", $text);
            else
                $questions = explode("\n\n", $text);

            $answers = $request->input('answers');
            //return json_encode(count($answers));
            if(count($questions) != strlen($answers))
                return response('问题和答案数量不匹配，请仔细检查！');
            else
            {
                for($i = 0; $i < count($questions); $i++)
                {
                    $q = new Question();
                    $q->content = $questions[$i];
                    $q->answer = $answers[$i];
                    $q->save();
                }
            }
            return response('成功添加' . strval(count($questions)) . '个问题！');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
