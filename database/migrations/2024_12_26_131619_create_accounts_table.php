<?php

use App\Models\Budget;
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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Budget::class)->constrained('budgets')->cascadeOnDelete();
            $table->string('name');
            $table->string('bank_name')->nullable();
            $table->string('account_number')->comment('Last Four')->nullable();
            $table->enum('account_type', ['checking', 'savings', 'cash'])->default('checking');
            $table->string('location')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
