<?php

use App\Models\Course;
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
        Schema::create('course_metas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class);
            $table->string("things_to_learn")->nullable();
            $table->string("requirements")->nullable();
            $table->string("target_audience")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_metas');
    }
};
