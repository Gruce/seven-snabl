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
        Schema::create('head_of_the_family_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->nullable()->constrained('personal_infos')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->boolean('is_mr')->default(false); // النسب
            $table->boolean('is_alive')->default(true);
            $table->string('job')->nullable(); // عمل الرب الاسرة
            $table->integer('salary')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('head_of_the_family_infos');
    }
};
