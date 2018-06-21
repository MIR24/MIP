<?php

use Illuminate\Database\Migrations\Migration;
use App\Country;

class InsertDummyCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Country::create([
            'name' => 'МИР',
            'image_url'=> '/images/flag-dummy.png'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Country::where('name','МИР')->forceDelete();
    }
}
