<div class="top-bar">
    <div class="top-menu main">
        <a href="/#participants">Участники пула</a>
        <a href="{{ route('static.about') }}">О проекте</a>
        <a href="{{ route('topics.index.front') }}">На главную</a>
        @guest
            <a id="home" href="{{ route('login') }}">Войти</a>
        @else
            <a id="home" href="{{ route('topics.index') }}">Личный раздел</a>
        @endguest
    </div>
    <div class="search-box-wrap">
        <div class="search-box">
            <input id="search" data-toggle="tooltip" data-placement="bottom" title="Введите белее двух символов" type="text" placeholder="ПОИСК"/>
            <div class="search-buttons">
                <div class="submit luppa"></div><div class="calendar" data-position="right top"></div>
                <div class="search-date">
                    <div id="dtpckr" class="datepicker-here"
                         data-range="true"
                         data-multiple-dates-separator=", "
                    ></div>
                    @yield('country_list')
                    <div id="submit" class="submit luppa"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="top-menu bayan">
        <a id="menu-btn" href="#menu" data-toggle="collapse">Меню</a>
        <div id="menu" class="collapse">
            <a href="#participants">Участники пула</a>
            <a href="#">О проекте</a>
            @guest
            <a href="{{ route('login') }}">Войти</a>
            @else
                <a href="{{ route('topics.index') }}">Личный раздел</a>
            @endguest
        </div>
    </div>
</div>