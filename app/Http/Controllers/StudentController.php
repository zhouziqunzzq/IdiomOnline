<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Team;

class StudentController extends Controller
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->session()->has('judge_status') || $request->session()->get('judge_status') == false) {
            $request->session()->flush();
            return response('Access denied.');
        }
        switch ($request->session()->get('exam_type')) {
            case 'single':
                //Check if exist
                if (Student::where('student_id', $request->input('student_id1'))->count() > 0)
                    return response('学号已存在！');
                $s = new Student();
                $s->student_id = $request->input('student_id1');
                $s->name = $request->input('name1');
                $s->school = $request->input('school1');
                $s->tel = $request->input('tel1');
                $s->qq = $request->input('qq1');
                $s->team_id = -1;
                $s->save();
                //Find a single-student team
                $ts = Team::where('count', '1')->get();
                if (count($ts) == 0) {
                    //Create new team
                    $t = new Team();
                    $t->count = 1;
                    $t->save();
                    //Update team id
                    $s->team_id = $t->id;
                    $s->save();
                } else {
                    //Assign student to random team
                    $t_id = rand(0, count($ts) - 1);
                    $t = $ts[$t_id];
                    $s->team_id = $t->id;
                    $s->save();
                    $t->count = 2;
                    $t->save();
                }
                break;
            case 'team':
                if (Student::where('student_id', $request->input('student_id1'))->count() > 0
                    || Student::where('student_id', $request->input('student_id2'))->count() > 0
                )
                    return response('学号已存在！');
                //Create new team
                $t = new Team();
                $t->count = 2;
                $t->save();
                //Add two students
                $s1 = new Student();
                $s1->student_id = $request->input('student_id1');
                $s1->name = $request->input('name1');
                $s1->school = $request->input('school1');
                $s1->tel = $request->input('tel1');
                $s1->qq = $request->input('qq1');
                $s1->team_id = $t->id;
                $s1->save();
                $s2 = new Student();
                $s2->student_id = $request->input('student_id2');
                $s2->name = $request->input('name2');
                $s2->school = $request->input('school2');
                $s2->tel = $request->input('tel2');
                $s2->qq = $request->input('qq2');
                $s2->team_id = $t->id;
                $s2->save();
                break;
        }
        //Clean judge status and exam type
        $request->session()->flush();
        return view('finish');
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

    public function getTeamInfo(Request $request)
    {
        $student_id = $request->input('student_id');
        $name = $request->input('name');
        $cnt = Student::where('student_id', $student_id)
            ->where('name', $name)
            ->count();
        if ($cnt == 0)
            return json_encode(array(
                'result' => false,
                'msg' => '用户名或密码错误'
            ));
        else
        {
            $s = Student::where('student_id', $student_id)
                ->where('name', $name)
                ->first();
            return json_encode(array(
                'result' => true,
                'data' => array(
                    'students' => $s->team->students,
                    'team_id' => $s->team->id
                )
            ));
        }
    }
}
