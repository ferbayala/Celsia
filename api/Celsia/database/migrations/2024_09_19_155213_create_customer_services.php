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
        Schema::create('customer_services', function (Blueprint $table) {
            $table->id();
            $table->date('initial_date');
            $table->date('last_billing');
            $table->bigInteger('last_pay');
            
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnUpdate();
            $table->foreignId('service_option_id')->constrained('service_options')->cascadeOnUpdate();

            $table->unique(array('customer_id', 'service_option_id'));

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_services');
    }
};
