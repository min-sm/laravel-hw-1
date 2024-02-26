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
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('drug_name', 30);
            $table->smallInteger('drug_amt')->unsigned();
            $table->tinyInteger('drug_amt_unit')->comment('1 for g
            2 for mg')->default(1)->constraints(function ($table) {
                $table->check('drug_amt_unit IN (1, 2)');
            });
            $table->mediumInteger('drug_stock')->unsigned();
            $table->decimal('drug_price');
            $table->tinyInteger('del_flg')->comment('0 for Active and 1 for Inactive')->default(0)->constraints(function ($table) {
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
        Schema::dropIfExists('drugs');
    }
};
