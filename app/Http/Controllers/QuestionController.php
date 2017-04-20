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
        $q = new Question();
        return json_encode($q->getFormatted('76.下列句子中划线成语使用正确的一项是（   ）     
A．初中生活快结束了，同学们面临分别，恋恋不舍，大家期望能萍水相逢在新的校园里。
B．令中外游客叹为观止的扬州漆器，用料讲究，色泽光润，造型优美，构思精巧，闻名遐迩。
C．朝鲜不顾世界各方坚决反对，再次进行核试验，在国际社会引起了强烈的轩然大波。
D．国外大面积爆发甲型H1N1流感疫情，这消息真是耸人听闻，大家一定要加强自我保护。'));
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
        //
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
