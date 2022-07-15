<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255)->nullable();
            $table->string('slug')->unique();
            $table->string('gender', 255)->nullable();
            $table->string('tanggal_lahir', 255)->nullable();
            $table->string('nik', 255)->nullable();
            $table->string('pekerjaan', 255)->nullable();
            $table->longText('alamat', 255)->nullable();
            $table->string('rt', 255)->nullable();
            $table->string('rw', 255)->nullable();
            $table->string('kelurahan', 255)->nullable();
            $table->string('kecamatan', 255)->nullable();
            $table->string('kabupaten_kota', 255)->nullable();
            $table->string('korwil', 255)->nullable();
            $table->string('tps', 255)->nullable();
            $table->string('ktp_image', 255)->nullable();


            $table->string('question_1', 255)->nullable();
            $table->string('question_2', 255)->nullable();
            $table->string('question_3', 255)->nullable();
            $table->string('question_4', 255)->nullable();
            $table->string('question_5', 255)->nullable();

            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggotas');
    }
}
