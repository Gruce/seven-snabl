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
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->nullable()->constrained('forms')->onDelete('cascade');
            $table->integer('level')->default(1); // 1 - B1 , 2 - B2 , 3 - B3 , 4 - B4
            $table->string('location')->nullable(); // المنطقة
            $table->string('point')->nullable(); // اقرب نقطة دالة
            $table->integer('location_type')->default(1);
            /*
                1 - ملك
                2 - تجاوز
                3 - ايجار
                4 - زراعي
            */

            $table->integer('rent')->nullable(); // الايجار
            $table->text('family_work')->nullable();
            $table->integer('salary_type')->default(1);
            /*
                1 - تقاعد
                2 - رعاية
                3 - مؤسسة
                4 - مساعدات
                5 - حكومي
            */
            $table->integer('salary')->nullable();
            $table->string('father_phonenumber')->nullable();
            $table->string('mother_phonenumber')->nullable();
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
        Schema::dropIfExists('personal_infos');
    }
};
