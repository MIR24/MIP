<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->index('deleted_at');
        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->index('deleted_at');
            $table->index('country_id');
            $table->index('name');
        });
        Schema::table('topics', function (Blueprint $table) {
            $table->index('published_at');
            $table->index('deleted_at');
            $table->index('video_id');
            $table->index('user_id');
            $table->index('status');
            $table->index('name');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->index('organization_id');
            $table->index(['organization_id', 'status']);
        });
        Schema::table('videos', function (Blueprint $table) {
            $table->index('deleted_at');
            $table->index('cdn_id');
            $table->index('cdn_cdn_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropIndex('countries_deleted_at_index');
        });
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropIndex('organizations_deleted_at_index');
            $table->dropIndex('organizations_country_id_index');
            $table->dropIndex('organizations_name_index');
        });
        Schema::table('topics', function (Blueprint $table) {
            $table->dropIndex('topics_published_at_index');
            $table->dropIndex('topics_deleted_at_index');
            $table->dropIndex('topics_video_id_index');
            $table->dropIndex('topics_user_id_index');
            $table->dropIndex('topics_status_index');
            $table->dropIndex('topics_name_index');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('users_organization_id_index');
            $table->dropIndex('users_organization_id_status_index');
        });
        Schema::table('videos', function (Blueprint $table) {
            $table->dropIndex('videos_deleted_at_index');
            $table->dropIndex('videos_cdn_id_index');
            $table->dropIndex('videos_cdn_cdn_url_index');
        });
    }
}
