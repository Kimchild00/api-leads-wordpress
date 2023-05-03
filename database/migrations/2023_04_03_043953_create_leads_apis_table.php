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
        Schema::create('leads_apis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telphone');
            $table->string('gadai_online')->nullable();
            $table->string('dana_ekspres')->nullable();
            $table->string('gadai_motor')->nullable();
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
        Schema::dropIfExists('leads_apis');
    }

};
