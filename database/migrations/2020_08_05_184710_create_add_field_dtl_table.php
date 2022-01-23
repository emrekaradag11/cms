<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddFieldDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        bu tablo ek alanlara ait içeriklerin dil'e göre değişmesini sağlamak için oluşturulmuştur.

        #group_id => bu kolon add_field tablosu ile birleştirmek içindir.
        #name => bu kısım ek alan başlığını dil'e göre değiştirmek içindir.
        #properties => bu kısım ek alana ait dil'e göre değişecek özelliklere belirtmek içindir.
        örneğin ; meyveler başlığı olarak checkbox olarak bi ek alan tanımlandı.
        bu ek alanın altına gelecek özellikler'in dil'e göre değişmesi gerekir. örneğin elma,armut,apple,banana gibi
        #lang => bu kolon data'nın bulunduğu dil', belirtir.

        */


        Schema::create('add_field_dtl', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id')->nullable();
            $table->string('name')->nullable();
            $table->string('properties')->nullable();
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
        Schema::dropIfExists('add_field_dtl');
    }
}
