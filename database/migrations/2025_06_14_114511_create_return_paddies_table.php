<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('return_paddies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('paddy_id'); // FK to paddies.id
            $table->decimal('quantity', 10, 2);
            $table->string('reason');
            $table->unsignedBigInteger('user_id')->nullable(); // who returned
            
            $table->timestamps();

            $table->foreign('paddy_id')->references('id')->on('paddies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('return_paddies');
    }
};
