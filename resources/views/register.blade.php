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
                    <div class="card green darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">恭喜</span>
                            <p class="center-align"><i class="material-icons">done</i>
                                恭喜，您答对了{{ $score }}题，成功晋级！请认真填写信息进行注册。</p>
                        </div>
                        {{--<div class="card-action">
                            <a href="#">这是一个链接</a>
                            <a href="#">这是一个链接</a>
                        </div>--}}
                    </div>
                </div>
            </div>
            <form action="/students" method="post" onsubmit="return validateForm();">
                <div class="row">
                    <div class="col s8 offset-s2">
                        <h3 class="blue-text text-darken-2">学生1</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">account_circle</i>
                        <input name="name1" id="name1" type="text" class="validate">
                        <label for="name1">姓名</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">info_outline</i>
                        <input name="student_id1" id="student_id1" type="text" class="validate">
                        <label for="student_id1">学号</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <select name="school1">
                            <option value="" disabled selected>请选择学院...</option>
                            <option value="文法学院">文法学院</option>
                            <option value="马克思主义学院">马克思主义学院</option>
                            <option value="外国语学院">外国语学院</option>
                            <option value="艺术学院">艺术学院</option>
                            <option value="工商管理学院">工商管理学院</option>
                            <option value="理学院">理学院</option>
                            <option value="资源与土木工程学院">资源与土木工程学院</option>
                            <option value="冶金学院">冶金学院</option>
                            <option value="材料科学与工程学院">材料科学与工程学院</option>
                            <option value="机械工程与自动化学院">机械工程与自动化学院</option>
                            <option value="信息科学与工程学院">信息科学与工程学院</option>
                            <option value="计算机科学与工程学院">计算机科学与工程学院</option>
                            <option value="软件学院">软件学院</option>
                            <option value="中和生物医学与信息工程学院">中和生物医学与信息工程学院</option>
                            <option value="生命健康与科学学院">生命健康与科学学院</option>
                            <option value="江河建筑学院">江河建筑学院</option>
                            <option value="国防教育学院">国防教育学院</option>
                            <option value="体育部">体育部</option>
                        </select>
                        <label>学院</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">phone</i>
                        <input name="tel1" id="tel1" type="tel" class="validate">
                        <label for="tel1">电话</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">info</i>
                        <input name="qq1" id="qq1" type="text" class="validate">
                        <label for="qq1">QQ</label>
                    </div>
                </div>
                @if(isset($exam_type) && $exam_type == 'team')
                    <div class="row">
                        <div class="col s8 offset-s2">
                            <h3 class="blue-text text-darken-2">学生2</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">account_circle</i>
                            <input name="name2" id="name2" type="text" class="validate">
                            <label for="name2">姓名</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">info_outline</i>
                            <input name="student_id2" id="student_id2" type="text" class="validate">
                            <label for="student_id2">学号</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <select name="school2">
                                <option value="" disabled selected>请选择学院...</option>
                                <option value="文法学院">文法学院</option>
                                <option value="马克思主义学院">马克思主义学院</option>
                                <option value="外国语学院">外国语学院</option>
                                <option value="艺术学院">艺术学院</option>
                                <option value="工商管理学院">工商管理学院</option>
                                <option value="理学院">理学院</option>
                                <option value="资源与土木工程学院">资源与土木工程学院</option>
                                <option value="冶金学院">冶金学院</option>
                                <option value="材料科学与工程学院">材料科学与工程学院</option>
                                <option value="机械工程与自动化学院">机械工程与自动化学院</option>
                                <option value="信息科学与工程学院">信息科学与工程学院</option>
                                <option value="计算机科学与工程学院">计算机科学与工程学院</option>
                                <option value="软件学院">软件学院</option>
                                <option value="中和生物医学与信息工程学院">中和生物医学与信息工程学院</option>
                                <option value="生命健康与科学学院">生命健康与科学学院</option>
                                <option value="江河建筑学院">江河建筑学院</option>
                                <option value="国防教育学院">国防教育学院</option>
                                <option value="体育部">体育部</option>
                            </select>
                            <label>学院</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">phone</i>
                            <input name="tel2" id="tel2" type="tel" class="validate">
                            <label for="tel2">电话</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s8 offset-s2">
                            <i class="material-icons prefix">info</i>
                            <input name="qq2" id="qq2" type="text" class="validate">
                            <label for="qq2">QQ</label>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="input-field col s8 offset-s2">
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
        (function ($) {
            $(function () {

                $('.button-collapse').sideNav();
                $(document).ready(function () {
                    $('select').material_select();
                });
            }); // end of document ready
        })(jQuery); // end of jQuery name space
        function validateForm() {
            var flag = true;
            $('form :input').each(function () {
                //console.log($(this).attr('name') + '   ' + $(this).val());
                if ($(this).attr('name') != 'action' &&
                    ( $(this).val() == '' || $(this).val() == null))
                    flag = false;
            });
            if (!flag) {
                alert('请填写完整的注册信息！');
                return false;
            }
            return true;
        }
    </script>
@endsection