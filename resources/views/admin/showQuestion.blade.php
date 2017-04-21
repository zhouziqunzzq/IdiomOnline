@extends('layouts.master')
@section('myCss')
    <link href="/css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@endsection
@section('content')
    @include('nav')
    <div id="background" class="blue lighten-3">
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light">共{{ count($questions) }}题</h5>
                </div>
            </div>
        </div>
        <div class="container">
            <form>
                @for($i = 0; $i < count($questions); $i++)
                    @include('question', [
                        'id' => $i + 1,
                        'content' => $questions[$i]['content'],
                        'choices' => $questions[$i]['choices'],
                        'answer' => $questions[$i]['answer']
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
        (function($){
            $(function(){

                $('.button-collapse').sideNav();

            }); // end of document ready
        })(jQuery); // end of jQuery name space
    </script>
@endsection