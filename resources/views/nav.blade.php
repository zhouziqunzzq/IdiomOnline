<nav class="light-blue darken-1" role="navigation">
    <div class="nav-wrapper container">
        <img class="hide-on-med-and-down" src="/img/neu.png"/>
        <a style="margin-left: 20px;" id="logo-container" href="/" class="brand-logo">{{env('APP_NAME_SHORT')}}</a>
        {{-- PC--}}
        <ul class="right hide-on-med-and-down">
            <li><a href="/teaminfo">组队信息查询</a></li>
            <li><a href="/">首页</a></li>
        </ul>
        {{--Mobile--}}
        <ul id="nav-mobile" class="side-nav">
            <li><a href="/">首页</a></li>
            <li><a href="/teaminfo">组队信息查询</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
