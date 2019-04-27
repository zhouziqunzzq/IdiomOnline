@extends('layouts.master')
@section('myCss')
    <link href="/css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')
    @include('nav')
    <div id="background" class="blue lighten-3">
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light">共 {{ count($questions) }} 题</h5>
                    <h5>{{ config('question.alias')[0] }} {{ $count[0] }} 题，
                        {{ config('question.alias')[1] }} {{ $count[1] }} 题，
                        {{ config('question.alias')[2] }} {{ $count[2] }} 题
                    </h5>
                </div>
            </div>
        </div>
        <div class="container">
            <form>
                @for($i = 0; $i < count($questions); $i++)
                    @include('question', [
                        'id' => $i + 1,
                        'content' => $questions[$i]['content'],
                        'choices' => $questions[$i]['choices'],
                        'answer' => $questions[$i]['answer'],
                        'type' => $questions[$i]['type']
                    ])
                    <a href="#!"
                       onclick="deleteQuestionByID({{ $i + 1 }}, {{ $questions[$i]['id'] }})"
                       class="btn waves-effect waves-light red col s4">删除</a>
                @endfor
                {{ csrf_field() }}
            </form>
        </div>
        @include('footer')
    </div>
@endsection
@section('myJs')
    <script>
        (function ($) {
            $(function () {

                $('.button-collapse').sideNav();

            }); // end of document ready
        })(jQuery); // end of jQuery name space

        const deleteQuestionByID = function (displayID, realID) {
            const rst = window.confirm("确定要删除第 " + displayID + " 题吗？");
            if (!rst) {
                return;
            }
            $.ajax({
                type: "DELETE",
                data: null,
                url: "/questions/" + realID,
                success: function (msg) {
                    let rst = eval("(" + msg + ")");
                    if (rst['result'] === false) {
                        alert(rst['msg']);
                    } else {
                        alert("删除成功");
                        window.location.reload(true);
                    }
                }
            });
        }
    </script>
@endsection
