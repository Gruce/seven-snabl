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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->nullable()->constrained('forms')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->integer('kinship')->nullable();
            /*
                1 - اب
                2 - ام
                3 - ابن
                4 - جد
                5 - جدة
                6 - اخ
                7- اخت
                8 - حفيد
            */
            $table->date('birthday')->nullable();
            $table->boolean('is_mr')->default(false);
            $table->string('job')->nullable();
            $table->text('health_state')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('family_members');
    }
};
