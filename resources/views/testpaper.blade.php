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
                <h2 class="header center blue-text text-darken-3">请接受考验</h2>
                <div class="row center">
                    <h5 class="header col s12 light">共15题</h5>
                </div>
            </div>
        </div>
        <div class="container">
            <form>
                @include('question', [
                'id' => 1,
                'content' => '请根据题中给出的成语解释或出处选择出最恰当的成语：本指蔺相如将和氏璧完好地自秦送回赵国。后比喻把原物完好地归还本人。',
                'choices' => ['A.完璧归赵', 'B.久假不归', 'C.物归原主', 'D.物归原主']
                ])
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