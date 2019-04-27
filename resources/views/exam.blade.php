@extends('layouts.master')
@section('myCss')
    <link href="/css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <style>
        .timeCounter {
            width: 200px;
            z-index: 100;
            position: absolute;
            right: 20px;
            top: 40px;
            float: right;
            background-color: rgba(255, 255, 255, 0.5);
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
        }
    </style>
@endsection
@section('content')
    @include('nav')
    <div id="background" class="blue lighten-3">
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h2 class="header center blue-text text-darken-3">请接受考验</h2>
                <div class="row center">
                    <h5 class="header col s12 light">共{{ count($questions) }}题</h5>
                </div>
            </div>
        </div>
        <div class="container timeCounter" id="timeCounter">
            <div class="row">
                <h5 class="center-align">还剩<span id="countdown">{{ $timeLimit }}</span>秒</h5>
            </div>
            <div class="row">
                <div class="progress col s8 offset-s2">
                    <div id="progressBar" class="determinate" style="width: 100%"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <form id="exam" action="/exam/judge" method="post" onsubmit="return validateForm();">
                @for($i = 0; $i < count($questions); $i++)
                    @include('question', [
                        'id' => $i + 1,
                        'type' => $questions[$i]['type'],
                        'content' => $questions[$i]['content'],
                        'choices' => $questions[$i]['choices'],
                    ])
                @endfor
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">交卷
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @include('footer')
    </div>
@endsection
@section('myJs')
    <script>
        $(window).scroll(function () {
            $("#timeCounter").css("top", $(document).scrollTop() + 80);
        });
        var timer;
        (function ($) {
            $(function () {

                $('.button-collapse').sideNav();
                timer = setTimeout("countdown()", 1000);
                $("#timeCounter").css("top", $(document).scrollTop() + 80);
            }); // end of document ready
        })(jQuery); // end of jQuery name space
        function countdown() {
            var nextTime = parseInt($('#countdown').html()) - 1;
            if (nextTime < 0) {
                clearTimeout(timer);
                alert('时间到，即将交卷...');
                $("#exam").submit();
            }
            else {
                $('#countdown').html(nextTime);
                var progress = parseInt($('#countdown').html()) / {{ $timeLimit }} * 100;
                $('#progressBar').css('width', progress + '%');
                if (progress >= 50)
                    $('#progressBar').addClass('green');
                else if (progress >= 20) {
                    $('#progressBar').removeClass('green');
                    $('#progressBar').addClass('orange');
                }
                else {
                    $('#progressBar').removeClass('orange');
                    $('#progressBar').addClass('red');
                }
                timer = setTimeout("countdown()", 1000);
            }
        }
        function validateForm()
        {
            if(parseInt($('#countdown').html()) == 0)
                return true;
            if($("input:checked").length != {{ count($questions) }})
                return confirm('还有题目未作答，确认交卷吗？');
            return true;
        }
    </script>
@endsection
