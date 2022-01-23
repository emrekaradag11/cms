<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
        #parent    => sayfaları tree mantığı ile bağlamak için
        #template  => sayfaların şablonlarını belirlemek için (Tree,text,img vs)
        #redirect  => hiç sayfa olmadan yönlendirme yapmak için (ÖRN:www.google.com)
        #hidden    => bu alan sayfaları gizlemek içindir. 1 ise gizli
        #ord       => sayfalar arası sıralama yapmak için
        */

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->integer('template')->nullable()->comment("şablon id'si 1 ise text şablon id'si 2 ise tree anlamına gelir");
            $table->string('redirect')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
