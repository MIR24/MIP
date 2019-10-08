<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameWowThread extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "UPDATE `threads` SET `name` = 'Память сердца' WHERE `name` = 'к 75-летию победы в ВОВ';";
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "UPDATE `threads` SET `name` = 'к 75-летию победы в ВОВ' WHERE `name` = 'Память сердца';";
        DB::connection()->getPdo()->exec($sql);
    }
}
