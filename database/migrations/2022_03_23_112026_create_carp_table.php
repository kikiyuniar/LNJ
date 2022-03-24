<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carp', function (Blueprint $table) {
            $table->id();
            $table->string('carp_code');
            $table->unsignedBigInteger('initiator_id');
            $table->unsignedBigInteger('recipient_id');
            $table->unsignedBigInteger('categories_id');
            $table->string('verified_by');
            $table->dateTime('due_date');
            $table->string('effectiveness');
            $table->dateTime('status_date');
            $table->string('stage');
            $table->string('status');
            $table->timestamps();

            $table->foreign('initiator_id')->references('id')->on('initiators');
            $table->foreign('recipient_id')->references('id')->on('recipients');
            $table->foreign('categories_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carp');
    }
}
