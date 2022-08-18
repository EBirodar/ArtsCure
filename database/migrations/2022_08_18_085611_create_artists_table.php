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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('first_name_uz');
            $table->string('last_name_uz');
            $table->string('speciality');
            $table->float('rate');
            $table->unsignedInteger('category_id');
            $table->string('description_uz');
            $table->string('muzey_uz');
            $table->string('medal_uz');
            $table->string('views');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
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
        Schema::dropIfExists('artists');
    }
};
