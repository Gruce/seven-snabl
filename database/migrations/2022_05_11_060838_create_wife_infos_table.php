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
        Schema::create('wife_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->nullable()->constrained('forms')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->integer('is_mis')->default(2); //  النسب الزوجة
            $table->integer('state')->default(1);
            /*
                1 - حي
                2 - متوفية
                3 - مطلقة
                4 - ارملة
            */
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
        Schema::dropIfExists('wife_infos');
    }
};
