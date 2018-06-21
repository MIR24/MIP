<?php

use Illuminate\Database\Migrations\Migration;

class SetDummyCountryForMir24 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $country_id = DB::table('countries')->where('name', 'МИР')->first()->id;
        DB::table('organizations')
            ->where('name', 'Межгосударственная телерадиокомпания «Мир»')
            ->update(['country_id' => $country_id]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $country_id = DB::table('countries')->where('name', 'Российская Федерация')->first()->id;
        DB::table('organizations')
            ->where('name', 'Межгосударственная телерадиокомпания «Мир»')
            ->update(['country_id' => $country_id]);
    }
}
