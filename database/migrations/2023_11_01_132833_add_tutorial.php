<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutorial', function (Blueprint $table) {
            $table->id();
            $table->string('judul_tutorial');
            $table->string('deskripsi'); 
            $table->string('bahan'); 
            $table->string('alat');
            $table->string('langkah_tutorial');
            $table->string('foto'); 
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
        Schema::dropIfExists('tutorial');
    }
};