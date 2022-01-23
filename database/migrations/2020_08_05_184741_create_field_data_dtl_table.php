<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldDataDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        /*

        bu tablo eklemiş olduğumuz ek alan kayıtlarını dil'e göre listelemek içindir.

        #group_id => field_data tablosu ile bağlamak içindir.
        #data => eklediğimiz data'yı temsil eder.
        #lang => data'nın bulunduğu dil'i temsil eder.


        */


        Schema::create('field_data_dtl', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id')->nullable();
            $table->string('text')->nullable();
            $table->integer('lang')->nullable();
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
        Schema::dropIfExists('field_data_dtl');
    }
}
