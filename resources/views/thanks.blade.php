@extends('layouts.master')
@section('myCss')
    <link href="/css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')
    @include('nav')
    <div id="background" class="blue lighten-3">
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h2 class="header center blue-text text-darken-3">初赛结果</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card pink darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">谢谢参与</span>
                            <p class="center-align">很遗憾，您只答对了{{ $score }}题，未达到晋级要求。感谢您的参与！</p>
                        </div>
                        {{--<div class="card-action">
                            <a href="#">这是一个链接</a>
                            <a href="#">这是一个链接</a>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        @include('footer')
    </div>
@endsection
@section('myJs')
    <script>
        (function($){
            $(function(){

                $('.button-collapse').sideNav();

            }); // end of document ready
        })(jQuery); // end of jQuery name space
    </script>
@endsection