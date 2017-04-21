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
                <h2 class="header center blue-text text-darken-3">注册成功</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card green darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">恭喜</span>
                            <p class="center-align">注册成功！您可以稍后使用姓名和学号登陆本系统查询组队信息。</p>
                        </div>
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