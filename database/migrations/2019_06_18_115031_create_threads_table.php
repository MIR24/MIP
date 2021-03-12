<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name');
            $table->string('image_url')->nullable();
        });

        Schema::table('topics', function (Blueprint $table) {
            $table->bigInteger('thread_id')->nullable();
            $table->index('thread_id');
        });

        $sql = "REPLACE INTO `threads`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`image_url`) VALUES
( '1', '2019-06-18 15:38:25', '2019-06-18 15:38:25', NULL, 'к 75-летию победы в ВОВ', '/images/75_wow.png' );";
        DB::connection()->getPdo()->exec($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->dropIndex('topics_thread_id_index');
            $table->dropColumn('thread_id');
        });

        Schema::dropIfExists('threads');
    }
}
