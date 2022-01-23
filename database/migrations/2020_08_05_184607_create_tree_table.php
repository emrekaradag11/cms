<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        Bu tablo tree şablonunda oluşturulan sayfalar için data barındırır.
        Örneğin Ürünler diye bir sayfamız var. buradaki page_id , pages tablosundaki id ile eşleşir,
        ve ürünler sayfasına ait dataları getirir.

        #parent   => bu alan tree yapısını kendi içerisinde kategorize etmek içindir.
        #type     => bu alan eğer 0 ise kategori 1 ise ürün olduğunu temsil eder.
        #page_id  => bu alan pages tablosu ile eşleşir ve bulunduğu sayfanın datalarını çeker.
        #hidden   => bu alan dataları gizlemek içindir. 1 ise gizli
        #ord      => bu alan datalar arası sıralama yapmak içindir

        */

        Schema::create('tree', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->integer('type')->nullable();
            $table->integer('page_id')->nullable();
            $table->integer('hidden')->default(0)->nullable()->comment("1 ise gizli 0 ise açık");
            $table->integer('ord')->nullable();
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
        Schema::dropIfExists('tree');
    }
}
