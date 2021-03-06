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
        Schema::create('give_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->nullable()->constrained('forms')->onDelete('cascade');
            $table->foreignId('give_type_id')->nullable()->constrained('give_types')->onDelete('cascade');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('give_forms');
    }
};
