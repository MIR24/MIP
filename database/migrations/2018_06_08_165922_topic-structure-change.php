<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TopicStructureChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topics', function (Blueprint $table) {
            $sql = "ALTER TABLE `topics` MODIFY `name` VARCHAR(255) NULL";
            DB::connection()->getPdo()->exec($sql);
            $sql = "ALTER TABLE `topics` MODIFY `description_short` TEXT NULL";
            DB::connection()->getPdo()->exec($sql);
            $sql = "ALTER TABLE `topics` MODIFY `description_long` TEXT NULL";
            DB::connection()->getPdo()->exec($sql);
            $sql = "ALTER TABLE `topics` MODIFY `url` VARCHAR(255) NULL";
            DB::connection()->getPdo()->exec($sql);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {
            $sql = "ALTER TABLE `topics` MODIFY `name` VARCHAR(255) NOT NULL";
            DB::connection()->getPdo()->exec($sql);
            $sql = "ALTER TABLE `topics` MODIFY `description_short` TEXT NOT NULL";
            DB::connection()->getPdo()->exec($sql);
            $sql = "ALTER TABLE `topics` MODIFY `description_long` TEXT NOT NULL";
            DB::connection()->getPdo()->exec($sql);
            $sql = "ALTER TABLE `topics` MODIFY `url` VARCHAR(255) NOT NULL";
            DB::connection()->getPdo()->exec($sql);
        });
    }
}
