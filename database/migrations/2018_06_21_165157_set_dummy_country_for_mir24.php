<?php

use Illuminate\Database\Migrations\Migration;
use App\Organization;
use App\Country;

class SetDummyCountryForMir24 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $mir24 = Organization::where('name', 'Межгосударственная телерадиокомпания «Мир»')->first();
        $country_id = Country::where('name', 'МИР')->first()->id;
        $mir24->country_id = $country_id;
        $mir24->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $mir24 = Organization::where('name', 'Межгосударственная телерадиокомпания «Мир»')->first();
        $country_id = Country::where('name', 'Российская Федерация')->first()->id;
        $mir24->country_id = $country_id;
        $mir24->save();
    }
}
