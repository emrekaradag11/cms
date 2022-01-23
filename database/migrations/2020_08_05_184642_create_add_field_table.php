<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*

        Bu tablo oluşturduğumuz yapılarda ihtiyaç duyulabilecek ekstra alanları temsil eder.
        Örneğin : oluşturduğumuz sitelerde bulunan iç sayfalarda banner yapısı var.
        bu banner yapısında 2 tane başlık olduğunu varsayalım.
        Bu başlığa örnek olarak ;

        "Kurumsal"
            "Yapılara Değer Katar"

        kurumsal ismi sayfanın başlığı olarak listeleyebiliriz, fakat diğer başlık için ekstra alana ihtiyaç olacak.
        bu noktada addfield tablosu devreye giriyor.
        kurumsal sayfası için ekstra alan oluşturuyoruz. bu alanın ismi "Alt Başlık" olsun.
        bu alanı oluşturduğumuzda kurumsal için ekstra bir başlık ekleyebiliyoruz.

        #type     => bu kısım ek alanın tipini belirlemek içindir. örneğin 1 ise input, 2 ise selectbox vb.
        #page_id  => bu kısım pages tablosu ile eşleştirmek içindir. ek alanın bulunduğu sayfayı listelemek içindir.
        --- page_id boş veya null ise eklenen ek alanlar tüm sayfalarda gözükür.
        #ord      => ek alanlar arası sıralama yapmak içindir.
        #hidden   => bu alan dataları gizlemek içindir. 1 ise gizli
        #options  => bu alan ek alanın ekstra özelliklerini tanımlamak için
        örneğin ; alanın tipi "input" ise bu alan input'a ait ekstra özellikleri tanımlamak içindir
        Ek alan olarak "input" , başlık olarak "telefon" girilmiş ise
        bu kısıma telefon formatını temsil eden özellik girilir.

        #TYPE ÖZELLİKLERİ

        checkbox,       => çoklu özellik çoklu seçim
        color,          => renk seçimi
        date,           => tarih seçimi
        datetime-local, => tarih ve saat seçimi
        email,          => e-posta
        file,           => dosya
        month,          => ay seçimi
        number,         => sayı
        radio,          => çoklu özellik tekli seçim
        range,          => seçim aralığı
        tel,            => telefon
        text,           => yazı
        time,           => saat
        url,            => site url için
        week,           => bulunduğu hafta için
        select,         => Selectbox için
        textarea,       => Büyük Metin Kutusu
        */


        Schema::create('add_field', function (Blueprint $table) {
            $table->id();
            //$table->integer('type')->nullable();
            $table->enum('type', [
                'checkbox',
                'color',
                'date',
                'datetime-local',
                'email',
                'file',
                'month',
                'number',
                'radio',
                'range',
                'tel',
                'text',
                'time',
                'url',
                'week',
                'select',
                'textarea'
            ]);
            $table->integer('page_id')->nullable();
            $table->integer('ord')->nullable();
            $table->integer('hidden')->default(0)->nullable()->comment("1 ise gizli 0 ise açık");
            $table->string('options')->nullable();
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
        Schema::dropIfExists('add_field');
    }
}
