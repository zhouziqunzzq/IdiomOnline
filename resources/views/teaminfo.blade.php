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
                <h2 class="header center blue-text text-darken-3">组队信息</h2>
            </div>
        </div>
        <div class="container">
            <div id="queryInfo">
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">account_circle</i>
                        <input name="name" id="name" type="text" class="validate">
                        <label for="name">姓名</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8 offset-s2">
                        <i class="material-icons prefix">info_outline</i>
                        <input name="student_id" id="student_id" type="text" class="validate">
                        <label for="student_id">学号</label>
                    </div>
                </div>
                <div class="row">
                    <a class="waves-effect waves-light btn col s4 offset-s4" onclick="getTeamInfo();">查询</a>
                </div>
            </div>
            <div id="info" class="row">
            </div>
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

        function getTeamInfo() {
            n = $('#name').val();
            s_id = $('#student_id').val();
            $.ajax({
                type: "POST",
                data: {name:n, student_id:s_id},
                url: "/teaminfo",
                success: function (msg) {
                    var rst = eval("(" + msg + ")");
                    if (rst['result'] == false) {
                        alert(rst['msg']);
                        return;
                    }
                    else {
                        $('#queryInfo').remove();
                        var htmldata = '<h3>队伍编号：' + rst.data.team_id + '</h3>';
                        for (var i in rst.data.students) {
                            htmldata +=
                                '<div class="col s12 m8 offset-m2">\
                                <div class="card green darken-1">\
                            <div class="card-content white-text">\
                            <div class="container">' +
                                    '<div class="row"><h4>姓名：' + rst.data.students[i].name + '</h4></div>' +
                                    '<div class="row"><h4>学院：' + rst.data.students[i].school + '</h4></div>' +
                                    '<div class="row"><h4>电话：' + rst.data.students[i].tel + '</h4></div>' +
                                    '<div class="row"><h4>QQ：  ' + rst.data.students[i].qq + '</h4></div>' +
                            '</div>\
                            </div>\
                            </div>\
                            </div>'
                        }
                        $('#info').html(htmldata);
                    }
                }
            });
        }
    </script>
@endsection