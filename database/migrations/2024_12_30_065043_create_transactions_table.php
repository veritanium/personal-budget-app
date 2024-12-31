<?php

use App\Models\Account;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Entity;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Budget::class)->constrained('budgets')->cascadeOnDelete();
            $table->foreignIdFor(Account::class)->constrained('accounts')->restrictOnDelete();
            $table->foreignIdFor(Category::class)->nullable()->constrained('categories')->restrictOnDelete();
            $table->foreignIdFor(Entity::class)->nullable()->constrained('entities')->restrictOnDelete();
            $table->string('type');
            $table->string('title');
            $table->text('notes')->nullable();
            $table->integer('amount');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
