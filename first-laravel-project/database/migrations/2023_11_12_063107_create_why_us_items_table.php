<?php

use App\Models\WhyUs;
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
        Schema::create('why_us_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon');
            $table->string('desc');
            // $table->integer('why_us_id')->unsigned()->nullable();
            // $table->foreign('why_us_id')->references('id')->on('why_us')->onDelete('restrict');
            $table->foreignIdFor(WhyUs::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_us_items');
    }
};
