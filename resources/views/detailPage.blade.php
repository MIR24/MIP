@extends('layouts.app')
@section('content')
    <div class="main-container">
        <div class="top-bar">
            <div class="top-menu main">
                <a href="#">Участники пула</a><a href="#">О проекте</a><a href="#">Присоединиться к пулу</a><a href="#">Личный раздел</a>
            </div>
            <div class="search-box">
                <input type="text" placeholder="ПОИСК"/>
                <div class="search-buttons">
                    <div class="luppa"></div><div class="calendar" data-position="right top"></div>
                    <div class="search-date">
                        <div class="datepicker-here"
                             data-multiple-dates="2"
                             data-multiple-dates-separator=", "
                        ></div>
                        <div id="submit" class="luppa"></div>
                    </div>
                </div>
            </div>
            <div class="top-menu bayan">
                <a id="menu-btn" href="#menu" data-toggle="collapse">Меню</a>
                <div id="menu" class="collapse"><a>Участники пула</a><a href="#">О проекте</a><a href="#">Присоединиться к пулу</a><a href="#">Личный раздел</a></div>
            </div>
        </div>
        <div class="detail-head">
            <div><div class="country" style="background-image: url(/images/armenia.png);"></div></div>
        </div>
        <div class="detail-description">
            <img src="/images/chahonnamo-big.png"/>
            <p class="sup">Равным образом реализация намеченных плановых заданий играет важную роль в формировании форм развития. Товарищи! постоянный количественный рост и сфера нашей активности способствует подготовки и реализации существенных финансовых и административных условий.</p>
            <p>Не следует, однако забывать, что постоянный количественный рост и сфера нашей активности позволяет оценить значение направлений прогрессивного развития. Равным образом укрепление и развитие структуры требуют от нас анализа модели развития. Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности играет важную роль в формировании системы обучения кадров, соответствует насущным потребностям.</p>
        </div>
        <div class="day-divider current"><div>13 мая</div><div>сб</div><div class="new-video">+ Видео</div></div>
        <div class="day-divider"><div>12 мая</div><div>сб</div></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="cellwrap">
                        <div class="remove-vidos"></div>
                        <div class="preview">
                            <iframe width="100%" height="370" src="//video.platformcraft.ru/embed/5b0ea5bfef3db55a0cf40915" frameborder="0" scrolling="no" allowfullscreen=""></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">4+</span></div>
                        <a href="#" class="description">
                            <div>Разнообразный и богатый опыт, постоянный количественный рост</div>
                            <div>Задача организации, в особенности же дальнейшее развитие различных форм деятельности требуют определения и уточнения</div>
                        </a>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cellwrap">
                        <div class="remove-vidos"></div>
                        <div class="preview">
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">16+</span></div>
                        <a href="#" class="description">
                            <div>Разнообразный и богатый опыт, постоянный количественный рост</div>
                            <div>Задача организации, в особенности же дальнейшее развитие различных форм деятельности требуют определения и уточнения</div>
                        </a>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cellwrap">
                        <div class="remove-vidos"></div>
                        <div class="preview">
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">0+</span></div>
                        <a href="#" class="description">
                            <div>Разнообразный и богатый опыт, постоянный количественный рост</div>
                            <div>Задача организации, в особенности же дальнейшее развитие различных форм деятельности требуют определения и уточнения</div>
                        </a>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="day-divider"><div>12 мая</div><div>сб</div></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="cellwrap">
                        <div class="remove-vidos"></div>
                        <div class="preview">
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">16+</span></div>
                        <a href="#" class="description">
                            <div>Разнообразный и богатый опыт, постоянный количественный рост</div>
                            <div>Задача организации, в особенности же дальнейшее развитие различных форм деятельности требуют определения и уточнения</div>
                        </a>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cellwrap">
                        <div class="remove-vidos"></div>
                        <div class="preview">
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">0+</span></div>
                        <a href="#" class="description">
                            <div>Разнообразный и богатый опыт, постоянный количественный рост</div>
                            <div>Задача организации, в особенности же дальнейшее развитие различных форм деятельности требуют определения и уточнения</div>
                        </a>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="show-more">Показать еще</div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 lc">
                        <div class="logo"></div>
                    </div>
                    <div class="col-md-4">
                        Таким образом дальнейшее развитие различных форм деятельности позволяет выполнять важные задания по разработке новых предложений. С другой стороны новая модель организационной деятельности требуют от нас анализа соответствующий условий активизации.
                    </div>
                    <div class="col-md-4">
                        Таким образом дальнейшее развитие различных форм деятельности позволяет выполнять важные задания по разработке новых предложений. С другой стороны новая модель организационной деятельности требуют от нас анализа соответствующий условий активизации.
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection