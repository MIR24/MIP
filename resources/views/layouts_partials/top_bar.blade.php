<div class="top-bar">
    <div class="top-menu main">
        <a href="#">Участники пула</a><a href="#">О проекте</a><a href="#">Присоединиться к пулу</a><a href="#">Личный раздел</a>
    </div>
    <div class="search-box">
        <input type="text" placeholder="ПОИСК"/>
        <div class="search-buttons">
            <div class="luppa"></div><div class="calendar" data-position="right top"></div>
            <div class="search-date">
                <div id="dtpckr" class="datepicker-here"
                     data-multiple-dates="2"
                     data-multiple-dates-separator=", "
                ></div>
                @yield('country_list')
                <div id="submit" class="luppa"></div>
            </div>
        </div>
    </div>
    <div class="top-menu bayan">
        <a id="menu-btn" href="#menu" data-toggle="collapse">Меню</a>
        <div id="menu" class="collapse"><a>Участники пула</a><a href="#">О проекте</a><a href="#">Присоединиться к пулу</a><a href="#">Личный раздел</a></div>
    </div>
</div>