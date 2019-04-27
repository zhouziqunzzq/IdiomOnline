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
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->session()->has('pwd') || $request->session()->get('pwd') != env('ADMIN_KEY'))
            return response('Access denied.');
        else {
            $text = trim($request->input('questions'));
            if (strpos($text, "\r\n\r\n") !== false)
                $questions = explode("\r\n\r\n", $text);
            else
                $questions = explode("\n\n", $text);

            $answers = preg_replace('/\s+/', '', $request->input('answers'));
            //return json_encode(count($answers));
            if (count($questions) != strlen($answers))
                return response(
                    '题面和答案数量不匹配，请仔细检查！<br/>' .
                    '题面数量：' . count($questions) . '<br/>' .
                    '答案数量：' . strlen($answers)
                );
            else {
                for ($i = 0; $i < count($questions); $i++) {
                    $q = new Question();
                    $q->content = $questions[$i];
                    $q->answer = $answers[$i];
                    $q->type = intval($request->input('type'));
                    $q->save();
                }
            }
            return response('成功添加' . strval(count($questions)) . '个问题！');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rst = Question::destroy($id);
        if ($rst > 0) {
            return json_encode([
                "code" => 200,
                "result" => true,
                "msg" => "ok",
                "data" => [
                    "id" => $id,
                    "rst" => $rst,
                ],
            ]);
        } else {
            return json_encode([
                "code" => 500,
                "result" => false,
                "msg" => "删除失败",
                "data" => [
                    "id" => $id,
                    "rst" => $rst,
                ],
            ]);
        }

    }
}
