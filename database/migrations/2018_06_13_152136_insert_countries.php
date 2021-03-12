<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "REPLACE INTO `countries`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`image_url`) VALUES
( '1', '2018-06-13 15:38:25', '2018-06-13 15:38:25', NULL, 'Республика Армения', '/images/armenia.png' ),
( '2', '2018-06-13 15:38:25', '2018-06-13 15:38:25', NULL, 'Республика Беларусь', '/images/belarus.png' ),
( '3', '2018-06-13 15:38:25', '2018-06-13 15:38:25', NULL, 'Республика Казахстан', '/images/kazahstan.png' ),
( '4', '2018-06-13 15:38:25', '2018-06-13 15:38:25', NULL, 'Кыргызская Республика', '/images/kyrgyzstan.png' ),
( '5', '2018-06-13 15:38:25', '2018-06-13 15:38:25', NULL, 'Российская Федерация', '/images/russia.png' ),
( '6', '2018-06-13 15:38:25', '2018-06-13 15:38:25', NULL, 'Республика Таджикистан', '/images/tadjikistan.png' );";
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('countries')->truncate();
    }
}
