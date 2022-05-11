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
            $table->integer('level')->default(1); // 1 - B1 , 2 - B2 , 3 - B3 , 4 - B4
            $table->string('head_family')->nullable(); // رب الاسرة
            $table->boolean('is_mr')->default(false); // النسب
            $table->boolean('is_alive')->default(true);
            $table->string('head_job')->nullable(); // عمل الرب الاسرة
            $table->integer('head_salary')->nullable();
            $table->string('wife_name')->nullable();
            $table->boolean('is_mis')->default(false); //  النسب الزوجة
            $table->integer('wife_state')->default(1);
            /*
            1 - حي
            2 - متوفية
            3 - مطلقة
            4 - ارملة
            */
            $table->string('location')->nullable();
            $table->string('point')->nullable(); // مكان
            $table->integer('location_type')->default(1);
            /*
            1 - ملك
            2 - تجاوز
            3 - ايجار
            4 - زراعي
            */
            $table->integer('rent')->nullable(); // الايجار
            $table->text('family_work')->nullable();
            $table->integer('family_count')->nullable();
            $table->integer('have_salary')->default(1);
            /*
            1 - تقاعد
            2 - رعاية
            3 - مؤسسة
            4 - مساعدات
            5 - حكومي
            */
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
        Schema::dropIfExists('personal_infos');
    }
};
