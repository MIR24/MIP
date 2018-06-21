<?php

use Illuminate\Database\Migrations\Migration;
use App\Organization;

class SetShortOrgNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        $organizations = [
            "«Национальная государственная телерадиокомпания Республики Беларусь», Республика Беларусь" => "БТРК",
            "«Всероссийская государственная телевизионная и радиовещательная компания», Российская Федерация" => "ВГТРК",
            "«Республиканская телерадиокорпорация «Казахстан»,  Республика Казахстан" => "Казахстан",
            "Межгосударственная телерадиокомпания «Мир»" => "МТРК МИР",
            "«Национальная телерадиовещательная корпорация Кыргызской Республики», Кырзызская Республика" => "Ала-тоо",
            "«Общественная телекомпания Армении», Республика Армения" => "Общественное телевидение Армении",
            "«Агентство «Хабар», Республика Казахстан" => "Хабар",
            "«Государственный информационный и общественный телеканал «Джахоннамо», Республика Таджикистан" => "Джахоннамо"
        ];

        foreach ($organizations as $name => $short) {
            if ($org = Organization::where('name', $name)->first()) {
                $org->name_short = $short;
                $org->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('organizations')->update(array('name_short' => null));
    }
}
