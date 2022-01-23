<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        Bu tablo anasayfada bulunan büyük slider yazı ve görselleri için kullanılır

        #hidden   => bu alan dataları gizlemek içindir. 1 ise gizli
        #ord      => bu alan datalar arası sıralama yapmak içindir

        */

        Schema::create('slider', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('slider');
    }
}
