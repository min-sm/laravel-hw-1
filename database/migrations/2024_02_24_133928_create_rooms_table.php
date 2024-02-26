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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('room_no');
            $table->tinyInteger('room_status')->comment('1 for 1 for "Available" 2 for "Active" 3 for "Lock"')->default(1)->constraints(function ($table) {
                $table->check('room_status IN (1, 2, 3)');
            });
            $table->tinyInteger('room_no_of_patients');
            $table->decimal('room_price');
            $table->tinyInteger('del_flg')->comment('0 for Active and 1 for Inactive')->default(1)->constraints(function ($table) {
                $table->check('del_flg IN (0, 1)');
            });
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
