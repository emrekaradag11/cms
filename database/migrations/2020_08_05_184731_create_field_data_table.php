<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        bu tablo tanımladığımız ek alanlara ait dataları, sayfalara ve diğer içeriklere uyarladığımız tablo
        örneğin; Beyaz Eşya isminde ve input text tipinde bir ek alanınız var.
        bu ek alan'a 1. dilde çamaşır makinesi, 2. dilde washing machine değerini girdiniz.
        bu değere ait tekrarlanmaması gereken ana kolonlarının depolandığı tablo burası.
        bu değerlerin dil'e göre depolandığı tablo ise field_data_dtl tablosudur.

        #parent => bu kolon , data eğer tree yapısında bir kayıt'a bağlıysa, bu kayıtla ilişkilendirmek için kullanılan alandır.
        #field_id => bu kolon eklemiş olduğumuz kayıt'ın hangi alan'a bağlı olduğunu gösterir.
        #page_id => bu kolon eklenen kayıt'ın bulunduğu sayfanın id'sini gösterir



         */


        Schema::create('field_data', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->integer('field_id')->nullable();
            $table->integer('page_id')->nullable();
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
        Schema::dropIfExists('field_data');
    }
}
