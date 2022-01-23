<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        web sitemizde oluşturacağımız dil seçenekleri içindir.
        #lang => dil ismini temsil eder
        #lang_short => dil'in kısaltması içindir örneğin; türkçe -> TR

        */

        Schema::create('lang', function (Blueprint $table) {
            $table->id();
            $table->string('lang')->nullable();
            $table->string('lang_short')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lang');
    }
}
