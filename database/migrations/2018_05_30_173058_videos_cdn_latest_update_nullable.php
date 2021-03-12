<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VideosCdnLatestUpdateNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('cdn_latest_update')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('videos')->whereNull('cdn_latest_update')->update(['cdn_latest_update' => '0']);
        Schema::table('videos', function (Blueprint $table) {
            $table->string('cdn_latest_update')->nullable(false)->change();
        });
    }
}
