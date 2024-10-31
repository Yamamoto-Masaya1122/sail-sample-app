<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->comment('会社名');
            $table->integer('a_course_flag')->default(0)->comment('0:非表示 1:表示');
            $table->integer('b_course_flag')->default(0)->comment('0:非表示 1:表示');
            $table->integer('c_course_flag')->default(0)->comment('0:非表示 1:表示');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
