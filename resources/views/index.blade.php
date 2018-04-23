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
                <h2 class="header center blue-text text-darken-3">欢迎步入传统文化的世界</h2>
                <div class="row center">
                    <h5 class="header col s12 light">请选择参赛方式：</h5>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section">
                <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m6">
                        <div class="icon-block">
                            <h2 class="center light-blue-text"><i class="material-icons">perm_identity</i></h2>
                            <h5 class="center">单人参赛</h5>
                            <p class="light">
                                <strong class="orange-text text-darken-3">总共15道题，您需要答对10道题及以上才可晋级。</strong>
                                成功晋级后，您需要填写自己的信息。</p>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="icon-block">
                            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                            <h5 class="center">组队参赛</h5>

                            <p class="light"><strong class="orange-text text-darken-3">您和一位伙伴共两人合作答题，
                                    总共30道题，您需要答对20道题及以上才可晋级。</strong>
                                成功晋级后，您需要填写队伍中两名成员的信息。</p>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row center">
                    <a href="/exam/single" id="download-button"
                       class="btn-large waves-effect waves-light blue col s4 offset-s1">单人参赛</a>
                    <a href="/exam/team" id="download-button"
                       class="btn-large waves-effect waves-light blue col s4 offset-s2">组队参赛</a>
                </div>
            </div>
            <br><br>
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