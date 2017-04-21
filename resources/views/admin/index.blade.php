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
                <h2 class="header center blue-text text-darken-3">后台管理</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <a class="waves-effect waves-light btn col s12 m4 offset-m4" href="/admin/addQuestion">添加考题</a>
            </div>
            <div class="row">
                <a class="waves-effect waves-light btn col s12 m4 offset-m4" href="/admin/showQuestion">查看考题</a>
            </div>
            <div class="row">
                <a class="waves-effect waves-light btn col s12 m4 offset-m4 red" href="/admin/logout">注销</a>
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