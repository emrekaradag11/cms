<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeDtlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*

        bu tablo tree tablosunu dil'e göre listelemek içindir.
        Örneğin tree tablosunda bir kayıt ekledik.
        bu kayıt'a ait dil'e göre değişecek kayıtları bu tabloda listeleniyor.
        ve listelenen kayıtlar group_id kolonu ile tree tablosuna bağlanıyor.
        böylelikle tree tablosundan diğer tablolara eşleştirme yaparken karmaşa yaşanmıyor.
        bu tablo sadece ilgili tree data'sının detay içeriğini (başlık, metin) çekmek içindir.

        #head => data'nın başlığını temsil eder.
        #text => data'nın metni'ni temsil eder.
        #group_id => bu alan tree tablosu ile eşleştirmek içindir.
        #lang => bu kolon içeriğin dile göre değişmesi içindir.

        */

        Schema::create('tree_dtl', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('text')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('slug')->unique();
            $table->integer('group_id')->nullable();
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
        Schema::dropIfExists('tree_dtl');
    }
}
