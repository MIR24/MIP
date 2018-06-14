<?php

namespace App\Helpers;

class Helper
{
    public static function getVideoTag($url, $type)
    {
        return '<video class="col-lg-12 col-md-12 col-sm-12" controls><source src="https://'. $url .'" type="'. $type .'">Ваш браузер не поддерживает воспроизведение видео</video>';
    }
}
