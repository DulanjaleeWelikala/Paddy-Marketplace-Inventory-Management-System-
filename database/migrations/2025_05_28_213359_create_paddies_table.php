<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('paddies', function (Blueprint $table) {
        $table->id();
        $table->string('paddy_id'); // not unique because it can be reused for same name
        $table->string('product_name');
        $table->text('description');
        $table->decimal('price', 10, 2);
        $table->decimal('quantity', 10, 2);
        $table->string('badge')->nullable();
        $table->string('image');
        $table->unsignedBigInteger('added_by')->nullable();
        $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
        $table->timestamps();
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('paddies', function (Blueprint $table) {
        $table->dropForeign(['added_by']);
        $table->dropColumn('added_by');
    });
}

};
