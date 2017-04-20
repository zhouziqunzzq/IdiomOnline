@extends('layouts.master')
@section('myCss')
    <link href="css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')
    <nav class="light-blue darken-1" role="navigation">
        <div class="nav-wrapper container">
            <img class="hide-on-med-and-down" src="img/neu.png"/>
            <a style="margin-left: 20px;" id="logo-container" href="#" class="brand-logo">成语大赛初赛在线答题</a>
            {{--<ul class="right hide-on-med-and-down">
                <li><a href="#">Navbar Link</a></li>
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>--}}
        </div>
    </nav>
    {{--<div style="background-image: url(img/bg.jpg);background-repeat: no-repeat;background-size:100%;">--}}
    <div class="blue lighten-3">
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h2 class="header center blue-text text-darken-3">欢迎步入成语的世界</h2>
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
                                成功晋级后，系统将为您随机分配一支队伍，队伍分配结果可在初赛结束后使用学号和姓名
                                登陆本系统查询。</p>
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

                    {{--<div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                            <h5 class="center">Easy to work with</h5>

                            <p class="light">We have provided detailed documentation as well as specific code examples to
                                help new users get started. We are also always open to feedback and can answer any questions
                                a user may have about Materialize.</p>
                        </div>
                    </div>--}}
                </div>
                <br/>
                <div class="row center">
                    <a href="#" id="download-button"
                       class="btn-large waves-effect waves-light blue col s4 offset-s1">单人参赛</a>
                    <a href="#" id="download-button"
                       class="btn-large waves-effect waves-light blue col s4 offset-s2">组队参赛</a>
                </div>

            </div>
            <br><br>

            <div class="section">

            </div>
        </div>
        <footer class="page-footer orange">
            <div class="footer-copyright center orange">
                <div class="container">
                    Template by <a class="orange-text text-lighten-3"
                                   href="http://materializecss.com">Materialize</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    Copyright by <a class="orange-text text-lighten-3"
                                    href="http://www.cool2645.com">Bittersweet</a>
                </div>
            </div>
        </footer>
    </div>
@endsection
