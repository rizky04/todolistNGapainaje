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
        Schema::create('catetans', function (Blueprint $table) {
            $table->id();
            $table->string('catatan');
            $table->unsignedBigInteger('categori_id');
            $table->foreign('categori_id')->references('id')->on('categoris')->onDelete('cascade');
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
        Schema::dropIfExists('catetans');
    }
};
