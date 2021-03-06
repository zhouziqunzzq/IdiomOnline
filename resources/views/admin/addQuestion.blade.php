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
                <h2 class="header center blue-text text-darken-3">添加问题</h2>
            </div>
        </div>
        <div class="container">
            <form action="/questions" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="questions" id="questions" class="materialize-textarea"></textarea>
                        <label for="questions" class="black-text">问题</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="answers" id="answers" class="materialize-textarea"></textarea>
                        <label for="answers" class="black-text">答案</label>
                    </div>
                </div>
                {{--<div class="row">
                    <div class="input-field col s12">
                        <input name="pwd" id="pwd" type="password" class="validate">
                        <label for="pwd" class="black-text">密码</label>
                    </div>
                </div>--}}
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light" type="submit" name="action">提交
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
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