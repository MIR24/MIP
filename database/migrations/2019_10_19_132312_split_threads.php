<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SplitThreads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "UPDATE `threads` SET `name` = 'к 75-летию победы в ВОВ' WHERE `name` = 'Память сердца';";
        DB::connection()->getPdo()->exec($sql);
        $sql = "REPLACE INTO `threads`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`image_url`) VALUES
( '2', '2019-10-19 18:00:00', '2019-10-19 18:00:00', NULL, 'Память сердца', '/images/heart_memory.png' );";
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "DELETE from `threads` WHERE `id` = 2;";
        DB::connection()->getPdo()->exec($sql);
        $sql = "UPDATE `threads` SET `name` = 'Память сердца' WHERE `name` = 'к 75-летию победы в ВОВ';";
        DB::connection()->getPdo()->exec($sql);
    }
}
