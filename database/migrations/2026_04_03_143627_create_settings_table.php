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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('site_name')->nullable();
            $table->text('description')->nullable();
            $table->string('website_url')->nullable();
            $table->text('warning_text')->nullable();
            $table->string('facebook')->nullable();
            $table->string('line')->nullable();

            // ข้อมูลขั้นตอนการทำงาน
            $table->string('step_1_icon')->nullable();
            $table->string('step_1_title')->nullable();
            $table->string('step_1_desc')->nullable();

            $table->string('step_2_icon')->nullable();
            $table->string('step_2_title')->nullable();
            $table->string('step_2_desc')->nullable();

            $table->string('step_3_icon')->nullable();
            $table->string('step_3_title')->nullable();
            $table->string('step_3_desc')->nullable();

            $table->string('step_4_icon')->nullable();
            $table->string('step_4_title')->nullable();
            $table->string('step_4_desc')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
