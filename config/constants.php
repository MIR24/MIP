<?php

return [

    'topics_ttl' => env('CONSTANTS_TOPICS_TTL', 60 * 24 * 70), // in minutes
    'topics_ttp' => env('CONSTANTS_TOPICS_TTP', 60 * 24 * 60), // in minutes
    'datepicker_delimiter' => env('CONSTANTS_DATEPICKER_DELIMITER', ' - '),
    'days_on_main' => 3,
    'search_limit' => 200,
    'ftp_download_prefix' => 'http://downloads.mip.news/',
    'carousel_images' => [
        '/images/am1.jpg',
        '/images/by1.jpg',
        '/images/kg1.jpg',
        '/images/kz1.jpg',
        '/images/ru1.jpg',
        '/images/tj1.jpg',
    ],
    'wow_carousel_images' => [
        '/images/wow_1.jpg',
        '/images/wow_2.jpg',
        '/images/wow_3.jpg',
        '/images/wow_4.jpg',
        '/images/wow_5.jpg',
        '/images/wow_6.jpg',
    ],
    'undeletable_threads' => [
        2
    ],
];
