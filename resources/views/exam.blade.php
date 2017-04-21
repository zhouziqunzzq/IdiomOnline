@extends('layouts.master')
@section('myCss')
    <link href="/css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <style>
        .timeCounter{
            width:200px;
            z-index:100px;
            position:absolute;
            right:20px;
            top: 40px;
            float:right;
            background-color: rgba(255, 255, 255, 0.5);
            -webkit-border-radius:10px;
            -moz-border-radius:10px;
            border-radius:10px;
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
            <form>
                @for($i = 0; $i < count($questions); $i++)
                    @include('question', [
                        'id' => $i + 1,
                        'content' => $questions[$i]['content'],
                        'choices' => $questions[$i]['choices']
                    ])
                @endfor
                {{ csrf_field() }}
            </form>
        </div>
        @include('footer')
    </div>
@endsection
@section('myJs')
    <script>
        $(window).scroll(function () {
            $("#timeCounter").css("top", $(document).scrollTop()+80 );
        });
        var timer;
        (function ($) {
            $(function () {

                $('.button-collapse').sideNav();
                timer = setTimeout("countdown()", 1000);
                $("#timeCounter").css("top", $(document).scrollTop()+80 );
            }); // end of document ready
        })(jQuery); // end of jQuery name space
        function countdown() {
            var nextTime = parseInt($('#countdown').html()) - 1;
            if (nextTime < 0) {
                clearTimeout(timer);
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
    </script>
@endsection