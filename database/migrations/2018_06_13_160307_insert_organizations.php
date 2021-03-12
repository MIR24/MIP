<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertOrganizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('organizations')->truncate();
        $sql = "REPLACE INTO `organizations`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`image_url_lg`,`image_url_sm`,`country_id`) VALUES
( '1', '2018-06-13 17:51:39', '2018-06-13 17:51:39', NULL, '«Национальная государственная телерадиокомпания Республики Беларусь», Республика Беларусь', '/images/bt-big.png', '/images/bt.png', '2' ),
( '2', '2018-06-13 17:51:39', '2018-06-13 17:51:39', NULL, '«Всероссийская государственная телевизионная и радиовещательная компания», Российская Федерация', '/images/vgtrk-big.png', '/images/vgtrk.png', '5' ),
( '3', '2018-06-13 17:51:39', '2018-06-13 17:51:39', NULL, '«Республиканская телерадиокорпорация «Казахстан»,  Республика Казахстан', '/images/qazaqstan-big.png', '/images/qazaqstan.png', '3' ),
( '4', '2018-06-13 17:51:39', '2018-06-13 17:51:39', NULL, 'Межгосударственная телерадиокомпания «Мир»', '/images/mir-big.png', '/images/mir.png', '5' ),
( '5', '2018-06-13 17:51:39', '2018-06-13 17:51:39', NULL, '«Национальная телерадиовещательная корпорация Кыргызской Республики», Кыргызская Республика', '/images/otk-big.png', '/images/otk.png', '4' ),
( '6', '2018-06-13 17:51:39', '2018-06-13 17:51:39', NULL, '«Общественная телекомпания Армении», Республика Армения', '/images/1-big.png', '/images/1.png', '1' ),
( '7', '2018-06-13 17:51:39', '2018-06-13 17:51:39', NULL, '«Агентство «Хабар», Республика Казахстан', '/images/habar-big.png', '/images/habar.png', '3' ),
( '8', '2018-06-13 17:51:39', '2018-06-13 17:51:39', NULL, '«Государственный информационный и общественный телеканал «Джахоннамо», Республика Таджикистан', '/images/chahonnamo-big.png', '/images/chahonnamo.png', '6' );";
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('organizations')->truncate();
    }
}
