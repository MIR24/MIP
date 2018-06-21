<?php

use Illuminate\Database\Migrations\Migration;

class InsertDummyCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "INSERT INTO `countries` (`name`, `image_url`) VALUES ('МИР', '/images/flag-dummy.png')";
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "DELETE FROM `countries` WHERE `name` = 'МИР'";
        DB::connection()->getPdo()->exec($sql);
    }
}
