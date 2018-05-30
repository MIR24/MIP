<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('cdn_id');
            $table->string('cdn_name');
            $table->string('cdn_path');
            $table->integer('cdn_size');
            $table->string('cdn_content_type');
            $table->string('cdn_create_date');
            $table->string('cdn_latest_update');
            $table->string('cdn_resource_url');
            $table->string('cdn_cdn_url');
            $table->string('cdn_vod_hls');
            $table->string('cdn_video');
            $table->boolean('cdn_private');
            $table->string('cdn_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
