<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixOrgName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('organizations')
            ->where([
                'name' => '«Национальная телерадиовещательная корпорация Кыргызской Республики», Кырзызская Республика'
            ])
            ->update([
                'name' => '«Национальная телерадиовещательная корпорация Кыргызской Республики», Кыргызская Республика'
            ]
        );

        DB::table('countries')
            ->where([
                'name' => 'Кырзызская Республика'
            ])
            ->update([
                'name' => 'Кыргызская Республика'
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('organizations')
            ->where([
                'name' => '«Национальная телерадиовещательная корпорация Кыргызской Республики», Кыргызская Республика'
            ])
            ->update([
                'name' => '«Национальная телерадиовещательная корпорация Кыргызской Республики», Кырзызская Республика'
            ]
        );

        DB::table('countries')
            ->where([
                'name' => 'Кыргызская Республика'
            ])
            ->update([
                'name' => 'Кырзызская Республика'
            ]
        );
    }
}
