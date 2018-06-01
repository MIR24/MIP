@extends('layouts.app')
@section('content')
    <div class="main-container">
        <header>
            <div class="top-bar">
                <div class="top-menu">
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
                                    <li><input type="checkbox" name="kazah" id="kz" class="chckbx" checked="checked"><label for="kz" class="chckbx-label">Казахстан</label></li>
                                    <li><input type="checkbox" name="kazah" id="az" class="chckbx" checked="checked"><label for="az" class="chckbx-label">Азербайджан</label></li>
                                    <li><input type="checkbox" name="kazah" id="ar" class="chckbx" checked="checked"><label for="ar" class="chckbx-label">Армения</label></li>
                                    <li><input type="checkbox" name="kazah" id="ru" class="chckbx" checked="checked"><label for="ru" class="chckbx-label">Россия</label></li>
                                    <li><input type="checkbox" name="kazah" id="by" class="chckbx" checked="checked"><label for="by" class="chckbx-label">Беларусь</label></li>
                                </ul>
                            </div>
                            <div id="submit">Найти</div>
                        </div>
                    </div>
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
                                    <div>Самое горячее видео</div>
                                    <div>прямиком с места происшествия!</div>
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
                                    <div>Корабль лавировал-лавировал</div>
                                    <div>да не выловировал</div>
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
                                    <div>Lorem ipsum?</div>
                                    <div>dolor sit amet!</div>
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
        </header>
        <div class="day-divider"><div>12 мая</div><div>сб</div><div class="new-video">+ Добавить ролик</div></div>
        <div class="container">
            <div class="row">
                <div class="col">
                        <div class="preview">
                            <img class="channel-logo" src="/images/vgtrk.png"/>
                            <iframe width="100%" height="370" src="//video.platformcraft.ru/embed/5b0ea5bfef3db55a0cf40915" frameborder="0" scrolling="no" allowfullscreen=""></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">4+</span></div>
                        <a href="#" class="description">
                            <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                            <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось короч</div>
                        </a>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                </div>
                <div class="col">
                        <div class="preview">
                            <img class="channel-logo" src="/images/habar.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">16+</span></div>
                        <a href="#" class="description">
                            <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                            <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                        </a>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                </div>
                <div class="col">
                        <div class="preview">
                            <img class="channel-logo" src="/images/otk.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">0+</span></div>
                    <a href="#" class="description">
                            <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                            <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                        </a>
                        <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/vgtrk.png"/>
                        <iframe width="100%" height="370" src="//video.platformcraft.ru/embed/5b0ea5bfef3db55a0cf40915" frameborder="0" scrolling="no" allowfullscreen=""></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">18+</span></div>
                    <a href="#" class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось короч</div>
                    </a>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                </div>
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/habar.png"/>
                        <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">16+</span></div>
                    <a href="#" class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                    </a>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                </div>
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/otk.png"/>
                        <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">36+</span></div>
                    <a href="#" class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                    </a>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                </div>
            </div>
        </div>
        <div class="day-divider"><div>12 мая</div><div>сб</div></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/vgtrk.png"/>
                        <iframe width="100%" height="370" src="//video.platformcraft.ru/embed/5b0ea5bfef3db55a0cf40915" frameborder="0" scrolling="no" allowfullscreen=""></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">16+</span></div>
                    <a href="#" class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось короч</div>
                    </a>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                </div>
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/habar.png"/>
                        <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">16+</span></div>
                    <a href="#" class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                    </a>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                </div>
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/otk.png"/>
                        <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">16+</span></div>
                    <a href="#" class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                    </a>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения <span class="country-mini" style="background-image: url(/images/armenia.png)"></span></div>
                </div>
            </div>
        </div>
        <div class="show-more">Показать еще</div>
        <div class="ch container">
            <div class="row">
                <a href="#" class="ch col">
                    <div class="channel-logo-big" style="background-image: url(/images/qazaqstan.png)">
                        <div class="country" style="background-image: url(/images/qazahstan.png)"></div>
                    </div>
                    <div class="advert">
                        <div>Анонс для этой ячейки не особо длинный и не особо короткий анонс</div>
                        <div class="ch-arrow"></div>
                    </div>
                </a>
                <a href="#" class="ch col">
                    <div class="channel-logo-big" style="background-image: url(/images/habar.png)">
                        <div class="country" style="background-image: url(/images/qazahstan.png)"></div>
                    </div>
                    <div class="advert">
                        <div>Анонс для этой ячейки не особо длинный и не особо короткий анонс</div>
                        <div class="ch-arrow"></div>
                    </div>
                </a>
                <a href="#" class="ch col">
                    <div class="channel-logo-big" style="background-image: url(/images/otk.png)">
                        <div class="country" style="background-image: url(/images/kyrgyzstan.png)"></div>
                    </div>
                    <div class="advert">
                        <div>Анонс для этой ячейки не особо длинный и не особо короткий анонс</div>
                        <div class="ch-arrow"></div>
                    </div>
                </a>
            </div>
            <div class="row">
                <a href="#" class="ch col">
                    <div class="channel-logo-big" style="background-image: url(/images/vgtrk.png)">
                        <div class="country" style="background-image: url(/images/russia.png)"></div>
                    </div>
                    <div class="advert">
                        <div>Анонс для этой ячейки не особо длинный и не особо короткий анонс</div>
                        <div class="ch-arrow"></div>
                    </div>
                </a>
                <a href="#" class="ch col">
                    <div class="channel-logo-big" style="background-image: url(/images/bt.png)">
                        <div class="country" style="background-image: url(/images/belarus.png)"></div>
                    </div>
                    <div class="advert">
                        <div>Анонс для этой ячейки не особо длинный и не особо короткий анонс</div>
                        <div class="ch-arrow"></div>
                    </div>
                </a>
                <a href="#" class="ch col">
                    <div class="channel-logo-big" style="background-image: url(/images/mir.png)">
                        <div class="country" style="background-image: url(/images/russia.png)"></div>
                    </div>
                    <div class="advert">
                        <div>Анонс для этой ячейки не особо длинный и не особо короткий анонс</div>
                        <div class="ch-arrow"></div>
                    </div>
                </a>
            </div>
            <div class="row">
                <a href="#" class="ch col">
                    <div class="channel-logo-big" style="background-image: url(/images/chahonnamo.png)">
                        <div class="country" style="background-image: url(/images/tadjikistan.png)"></div>
                    </div>
                    <div class="advert">
                        <div>Анонс для этой ячейки не особо длинный и не особо короткий анонс</div>
                        <div class="ch-arrow"></div>
                    </div>
                </a>
                <a href="#" class="ch col">
                    <div class="channel-logo-big" style="background-image: url(/images/1.png)">
                        <div class="country" style="background-image: url(/images/armenia.png)"></div>
                    </div>
                    <div class="advert">
                        <div>Анонс для этой ячейки не особо длинный и не особо короткий анонс</div>
                        <div class="ch-arrow"></div>
                    </div>
                </a>
                <div class="ch ch-mip col">
                    <div class="channel-logo-big"></div>
                    <div class="ch-arrow"></div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col lc">
                        <div class="logo"></div>
                    </div>
                    <div class="col">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                    </div>
                    <div class="col">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur
                    </div>
                    <div class="col">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection