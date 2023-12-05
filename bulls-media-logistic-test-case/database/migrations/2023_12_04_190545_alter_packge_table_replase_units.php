<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('width_unit_id');
            $table->dropColumn('height_unit_id');
            $table->dropColumn('length_unit_id');
            $table->dropColumn('weight_unit_id');

            $table->foreignIdFor(User::class, 'user_id');
            $table->string('width_unit', 8);
            $table->string('height_unit', 8);
            $table->string('length_unit', 8);
            $table->string('weight_unit', 8);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('width_unit');
            $table->dropColumn('height_unit');
            $table->dropColumn('length_unit');
            $table->dropColumn('weight_unit');

            $table->integer('width_unit_id');
            $table->integer('height_unit_id');
            $table->integer('length_unit_id');
            $table->integer('weight_unit_id');
        });
    }
};
