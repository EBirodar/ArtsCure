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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_uz');
            $table->string('certificate')->nullable();
            $table->string('frame');
            $table->float('size')->nullable();
            $table->string('description_uz')->nullable();
            $table->string('year')->nullable();
            $table->string('city')->nullable();
            $table->string('unique')->nullable();
            $table->string('signature')->nullable();
            $table->string('price')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('views')->nullable();
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
        Schema::dropIfExists('products');
    }
};
