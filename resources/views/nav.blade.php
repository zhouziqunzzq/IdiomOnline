<nav class="light-blue darken-1" role="navigation">
    <div class="nav-wrapper container">
        {{--        <img class="hide-on-med-and-down" src="/img/neu.png"/>--}}
        <img class="hide-on-med-and-down" style="margin-top: 0.4rem;" src="/img/neu_cse.png"/>
        {{-- PC--}}
        <a style="margin-left: 0.5rem;" id="logo-container" href="/"
           class="brand-logo hide-on-med-and-down">
            {{env('APP_NAME_SHORT')}}
        </a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/teaminfo">组队信息查询</a></li>
            <li><a href="/">首页</a></li>
        </ul>
        {{--Mobile--}}
        <a id="logo-container" href="/"
           class="brand-logo hide-on-large-only"
           style="margin-left: 0.5rem; font-size: 1.6rem;">
            {{env('APP_NAME_SHORT')}}
        </a>
        <ul id="nav-mobile" class="side-nav">
            <li><a href="/">首页</a></li>
            <li><a href="/teaminfo">组队信息查询</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
