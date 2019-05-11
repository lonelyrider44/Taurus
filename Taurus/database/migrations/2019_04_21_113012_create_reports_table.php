<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ime_i_prezime_vlasnika');
            $table->string('adresa_vlasnika');
            $table->string('telefon_vlasnika');
            $table->string('vrsta_pacijenta');
            $table->string('rasa_pacijenta');
            $table->string('pol_pacijenta');
            $table->string('ime_pacijenta');
            $table->string('datum_rodjenja_pacijenta');
            $table->string('id_pacijenta');
            $table->text('prethodna_istorija')->nullable();
            $table->text('anamneza');
            //$table->text('nervni_i_lokomotorni_sistem_opis_abnormalnosti')->nullable();
            //$table->text('usi_opis_abnormalnosti')->nullable();
            $table->text('klinicki_nalaz')->nullable();
            $table->text('dijagnoza');
            $table->text('terapija');
            $table->boolean('placeno')->default(false);
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Reports');
        Schema::table('Reports', function (Blueprint $table) {
            //
        });
    }
}
