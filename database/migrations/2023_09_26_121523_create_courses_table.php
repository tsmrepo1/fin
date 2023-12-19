<?php

use App\Models\Category;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("subtitle");
            $table->string("image")->nullable();
            $table->string("language")->nullable();
            $table->foreignIdFor(Category::class);
            $table->enum("level", array("BEGINNER", "INTERMEDIATE", "EXPERT", "ALL"))->nullable();
            $table->enum("price_type", array("FREE", "PAID"))->nullable();
            $table->float("price",  11,2)->nullable();
            $table->float("sale_price", 11,2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
