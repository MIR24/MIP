@extends('layouts.app')
@section('content')
    <div class="main-container">
        <div class="top-bar">
            <div class="top-menu">
                <div>Участники пула</div><div>О проекте</div><div>Присоединиться к пулу</div><div>Личный раздел</div>
            </div>
            <div class="search-box">
                <input type="text" placeholder="ПОИСК..."/>
                <div class="search-buttons">
                    <div><img src="/images/lupa.png"/></div><div class="calendar"></div>
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
                    <div class="poster" style="background-image: url(/images/foo.png)">
                        <div class="poster-content">
                            <div class="poster-titles">
                                <div>Самое горячее видео</div>
                                <div>прямиком с места происшествия!</div>
                            </div>
                            <div class="poster-arrow">➔</div>
                        </div>
                        <img class="mip-logo" src="/images/mip-logo.png" alt="First slide">
                        <img class="d-block w-100 blue-cover" src="/images/mip.png" alt="First slide">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="poster" style="background-image: url(/images/grapes.jpg)">
                        <div class="poster-content">
                            <div class="poster-titles">
                                <div>Корабль лавировал-лавировал</div>
                                <div>да не выловировал</div>
                            </div>
                            <div class="poster-arrow">➔</div>
                        </div>
                        <img class="mip-logo" src="/images/mip-logo.png" alt="First slide">
                        <img class="d-block w-100 blue-cover" src="/images/mip.png" alt="First slide">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="poster" style="background-image: url(/images/fr.png)">
                        <div class="poster-content">
                            <div class="poster-titles">
                                <div>Lorem ipsum?</div>
                                <div>dolor sit amet!</div>
                            </div>
                            <div class="poster-arrow">➔</div>
                        </div>
                        <img class="mip-logo" src="/images/mip-logo.png" alt="First slide">
                        <img class="d-block w-100 blue-cover" src="/images/mip.png" alt="First slide">
                    </div>
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
        <div class="day-divider"><div>12 мая</div><div>сб</div><div class="new-video">+ Добавить ролик</div></div>
        <div class="container">
            <div class="row">
                <div class="col">
                        <div class="preview">
                            <img class="channel-logo" src="/images/vgtrk.png"/>
                            <iframe width="100%" height="370" src="//video.platformcraft.ru/embed/5b0ea5bfef3db55a0cf40915" frameborder="0" scrolling="no" allowfullscreen=""></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">16+</span></div>
                        <div class="description">
                            <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                            <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось короч</div>
                        </div>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения</div>
                </div>
                <div class="col">
                        <div class="preview">
                            <img class="channel-logo" src="/images/habar.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">16+</span></div>
                        <div class="description">
                            <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                            <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                        </div>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения</div>
                </div>
                <div class="col">
                        <div class="preview">
                            <img class="channel-logo" src="/images/otk.png"/>
                            <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                        </div>
                        <div class="icons"><span class="age-restriction">16+</span></div>
                    <div class="description">
                            <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                            <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                        </div>
                        <div class="pub-date">10 мая 2018</div>
                        <div class="pub-geo">Ереван, Армения</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/vgtrk.png"/>
                        <iframe width="100%" height="370" src="//video.platformcraft.ru/embed/5b0ea5bfef3db55a0cf40915" frameborder="0" scrolling="no" allowfullscreen=""></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">16+</span></div>
                    <div class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось короч</div>
                    </div>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения</div>
                </div>
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/habar.png"/>
                        <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">16+</span></div>
                    <div class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                    </div>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения</div>
                </div>
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/otk.png"/>
                        <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">16+</span></div>
                    <div class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                    </div>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения</div>
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
                    <div class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось корочживется или легко живется главное чтоб жилось короч</div>
                    </div>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения</div>
                </div>
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/habar.png"/>
                        <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5afc1bc2ef3db55a0cf35c32/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_158x14_detail_crop_323ed1320f5095444cc0cedfb10d5edf104bb1605878b94b47afc02623f743fb.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">16+</span></div>
                    <div class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                    </div>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения</div>
                </div>
                <div class="col">
                    <div class="preview">
                        <img class="channel-logo" src="/images/otk.png"/>
                        <iframe src="//playercdn.cdnvideo.ru/aloha/players/mirtv_player_vod1.html?source=//video.platformcraft.ru/vod/5b0532c90e47cf3de9820f6c/playlist.m3u8&poster=//editors17.mir24.tv/uploaded/images/crops/2018/May/870x489_230x119_detail_crop_3815a275197df51d4339dc546076baaed4846cab0021eb2b3af4ce8316a26af0.jpg" frameborder="0" width="100%" height="100%" scrolling="no" style="overflow:hidden;" allowfullscreen></iframe>
                    </div>
                    <div class="icons"><span class="age-restriction">16+</span></div>
                    <div class="description">
                        <div>Заголовок в две строки dfsgfsd sdgfdsgdfsg или нет ололо</div>
                        <div>Это видео о том как нелегко живется или легко живется главное чтоб жилось короч</div>
                    </div>
                    <div class="pub-date">10 мая 2018</div>
                    <div class="pub-geo">Ереван, Армения</div>
                </div>
    </div>
@endsection