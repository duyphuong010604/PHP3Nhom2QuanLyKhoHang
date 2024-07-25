<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->nullable()->constrained()->nullOnDelete();
            $table->string('sku')->nullable();
            $table->string('name');
            $table->double('price');
            $table->double('cost');
            $table->text('description')->nullable();
            $table->string('imageUrl')->nullable();
            $table->string('dimensions')->nullable();
            $table->double('weight')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // Thêm ràng buộc kiểm tra (check constraint)
        DB::statement('ALTER TABLE products ADD CONSTRAINT price_must_be_greater_than_or_equal_to_cost CHECK (price >= cost)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE products DROP CONSTRAINT price_must_be_greater_than_or_equal_to_cost');
        Schema::dropIfExists('products');

    }
};
