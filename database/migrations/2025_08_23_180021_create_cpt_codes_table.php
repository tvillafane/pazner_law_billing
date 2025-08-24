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
        Schema::create('cpt_codes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('price_in_cents');
            $table->string('description')->nullable();
            $table->string('mod')->nullable();
            $table->string('cpt_code')->index();
            $table->boolean('is_facility_pricing');
            $table->foreignId('client_id')->nullable()->constrained();
            $table->timestamp('period_start');
            $table->timestamp('period_end');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpt_codes');
    }
};
