<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Unit;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->float('width');
            $table->float('height');
            $table->float('length');
            $table->float('weight');
            $table->foreignIdFor(Unit::class, 'width_unit_id');
            $table->foreignIdFor(Unit::class,'height_unit_id');
            $table->foreignIdFor(Unit::class,'length_unit_id');
            $table->foreignIdFor(Unit::class,'weight_unit_id');
            $table->string('type', 64);
            $table->string('description', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
