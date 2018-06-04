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
                        <div class="datepicker-here"></div>
                        <div class="countries">
                            <ul>
                                <li><input type="checkbox" id="ru" class="chckbx" checked="checked"><label for="ru" class="chckbx-label">Россия</label></li>
                                <li><input type="checkbox" id="by" class="chckbx"><label for="by" class="chckbx-label">Беларусь</label></li>
                                <li><input type="checkbox" id="kz" class="chckbx"><label for="kz" class="chckbx-label">Казахстан</label></li>
                                <li><input type="checkbox" id="kg" class="chckbx"><label for="kg" class="chckbx-label">Кыргызстан</label></li>
                                <li><input type="checkbox" id="tj" class="chckbx"><label for="tj" class="chckbx-label">Таджикистан</label></li>
                                <li><input type="checkbox" id="ar" class="chckbx"><label for="ar" class="chckbx-label">Армения</label></li>
                            </ul>
                        </div>
                        <div id="submit" class="luppa"></div>
                    </div>
                </div>
            </div>
            <div class="top-menu bayan">
                <a id="menu-btn" href="#menu" data-toggle="collapse">Меню</a>
                <div id="menu" class="collapse"><a>Участники пула</a><a href="#">О проекте</a><a href="#">Присоединиться к пулу</a><a href="#">Личный раздел</a></div>
            </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a class="poster" href="#" style="background-image: url(/images/foo.png)">
                            <div class="poster-content">
                                <div class="poster-titles">
                                    <div>Современные исследования</div>
                                    <div>Реплицированные с зарубежных источников</div>
                                </div>
                                <div class="poster-arrow">➔</div>
                            </div>
                            <img class="mip-logo" src="/images/mip-logo.png" alt="First slide">
                            <img class="d-block w-100 blue-cover" src="/images/mip.png" alt="First slide">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a class="poster" href="#" style="background-image: url(/images/grapes.jpg)">
                            <div class="poster-content">
                                <div class="poster-titles">
                                    <div>Высокий уровень вовлечения</div>
                                    <div>представителей целевой аудитории</div>
                                </div>
                                <div class="poster-arrow">➔</div>
                            </div>
                            <img class="mip-logo" src="/images/mip-logo.png" alt="First slide">
                            <img class="d-block w-100 blue-cover" src="/images/mip.png" alt="First slide">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a class="poster" href="#" style="background-image: url(/images/fr.png)">
                            <div class="poster-content">
                                <div class="poster-titles">
                                    <div>многие известные личности</div>
                                    <div>в равной степени предоставлены сами себе</div>
                                </div>
                                <div class="poster-arrow">➔</div>
                            </div>
                            <img class="mip-logo" src="/images/mip-logo.png" alt="First slide">
                            <img class="d-block w-100 blue-cover" src="/images/mip.png" alt="First slide">
                        </a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <div class="day-divider current"><div>12 мая</div><div>сб</div><div class="new-video">+ Новый ролик</div></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="cellwrap">
                        <div class="preview">
                            <img class="channel-logo" src="/images/vgtrk.png"/>
                            <iframe width="100%" height="370" src="//video.platformcraft.ru/embed/5b0ea5bfef3db55a0cf40915" frameborder="0" scrolling="no" allowfullscreen=""></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">4+</span></div>
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
                        <div class="preview">
                            <img class="channel-logo" src="/images/habar.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">16+</span></div>
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
                    <div class="preview">
                        <img class="channel-logo" src="/images/otk.png"/>
                        <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                    </div>
                    <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">0+</span></div>
                        <a href="#" class="description">
                            <div>Разнообразный и богатый опыт, постоянный количественный рост</div>
                            <div>Задача организации, в особенности же дальнейшее развитие различных форм деятельности требуют определения и уточнения</div>
                        </a>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="cellwrap">
                        <div class="preview">
                            <img class="channel-logo" src="/images/vgtrk.png"/>
                            <iframe width="100%" height="370" src="//video.platformcraft.ru/embed/5b0ea5bfef3db55a0cf40915" frameborder="0" scrolling="no" allowfullscreen=""></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">4+</span></div>
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
                        <div class="preview">
                            <img class="channel-logo" src="/images/habar.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">16+</span></div>
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
                        <div class="preview">
                            <img class="channel-logo" src="/images/otk.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">0+</span></div>
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
                        <div class="preview">
                            <img class="channel-logo" src="/images/vgtrk.png"/>
                            <iframe width="100%" height="370" src="//video.platformcraft.ru/embed/5b0ea5bfef3db55a0cf40915" frameborder="0" scrolling="no" allowfullscreen=""></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">4+</span></div>
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
                        <div class="preview">
                            <img class="channel-logo" src="/images/habar.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">16+</span></div>
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
                        <div class="preview">
                            <img class="channel-logo" src="/images/otk.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">0+</span></div>
                        <a href="#" class="description">
                            <div>Разнообразный и богатый опыт, постоянный количественный рост</div>
                            <div>Задача организации, в особенности же дальнейшее развитие различных форм деятельности требуют определения и уточнения</div>
                        </a>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="cellwrap">
                        <div class="preview">
                            <img class="channel-logo" src="/images/vgtrk.png"/>
                            <iframe width="100%" height="370" src="//video.platformcraft.ru/embed/5b0ea5bfef3db55a0cf40915" frameborder="0" scrolling="no" allowfullscreen=""></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">4+</span></div>
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
                        <div class="preview">
                            <img class="channel-logo" src="/images/habar.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">16+</span></div>
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
                        <div class="preview">
                            <img class="channel-logo" src="/images/otk.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="download">Скачать ⬇</span><span class="age-restriction">0+</span></div>
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
        <div class="ch container">
            <div class="row">
                <a href="#" class="ch col-md-4">
                    <div class="cellwrap">
                        <div class="channel-logo-big" style="background-image: url(/images/qazaqstan.png)">
                            <div class="country" style="background-image: url(/images/qazahstan.png)"></div>
                        </div>
                        <div class="advert">
                            <div>Значимость этих проблем настолько очевидна, насколько возможно</div>
                            <div class="ch-arrow"></div>
                        </div>
                    </div>
                </a>
                <a href="#" class="ch col-md-4">
                    <div class="cellwrap">
                        <div class="channel-logo-big" style="background-image: url(/images/habar.png)">
                            <div class="country" style="background-image: url(/images/qazahstan.png)"></div>
                        </div>
                        <div class="advert">
                            <div>Значимость этих проблем настолько очевидна, насколько возможно</div>
                            <div class="ch-arrow"></div>
                        </div>
                    </div>
                </a>
                <a href="#" class="ch col-md-4">
                    <div class="cellwrap">
                        <div class="channel-logo-big" style="background-image: url(/images/otk.png)">
                            <div class="country" style="background-image: url(/images/kyrgyzstan.png)"></div>
                        </div>
                        <div class="advert">
                            <div>Значимость этих проблем настолько очевидна, насколько возможно</div>
                            <div class="ch-arrow"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row">
                <a href="#" class="ch col-md-4">
                    <div class="cellwrap">
                        <div class="channel-logo-big" style="background-image: url(/images/vgtrk.png)">
                            <div class="country" style="background-image: url(/images/russia.png)"></div>
                        </div>
                        <div class="advert">
                            <div>Значимость этих проблем настолько очевидна, насколько возможно</div>
                            <div class="ch-arrow"></div>
                        </div>
                    </div>
                </a>
                <a href="#" class="ch col-md-4">
                    <div class="cellwrap">
                        <div class="channel-logo-big" style="background-image: url(/images/bt.png)">
                            <div class="country" style="background-image: url(/images/belarus.png)"></div>
                        </div>
                        <div class="advert">
                            <div>Значимость этих проблем настолько очевидна, насколько возможно</div>
                            <div class="ch-arrow"></div>
                        </div>
                    </div>
                </a>
                <a href="#" class="ch col-md-4">
                    <div class="cellwrap">
                        <div class="channel-logo-big" style="background-image: url(/images/mir.png)">
                            <div class="country" style="background-image: url(/images/russia.png)"></div>
                        </div>
                        <div class="advert">
                            <div>Значимость этих проблем настолько очевидна, насколько возможно</div>
                            <div class="ch-arrow"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row">
                <a href="#" class="ch col-md-4">
                    <div class="cellwrap">
                        <div class="channel-logo-big" style="background-image: url(/images/chahonnamo.png)">
                            <div class="country" style="background-image: url(/images/tadjikistan.png)"></div>
                        </div>
                        <div class="advert">
                            <div>Значимость этих проблем настолько очевидна, насколько возможно</div>
                            <div class="ch-arrow"></div>
                        </div>
                    </div>
                </a>
                <a href="#" class="ch col-md-4">
                    <div class="cellwrap">
                        <div class="channel-logo-big" style="background-image: url(/images/1.png)">
                            <div class="country" style="background-image: url(/images/armenia.png)"></div>
                        </div>
                        <div class="advert">
                            <div>Значимость этих проблем настолько очевидна, насколько возможно</div>
                            <div class="ch-arrow"></div>
                        </div>
                    </div>
                </a>
                <a href="#" class="ch ch-mip col-md-4">
                    <div class="cellwrap">
                        <div class="channel-logo-big">
                            <div class="country"></div>
                        </div>
                        <div class="advert">
                            <div>Правила присоединения к информационному пулу</div>
                            <div class="ch-arrow"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
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