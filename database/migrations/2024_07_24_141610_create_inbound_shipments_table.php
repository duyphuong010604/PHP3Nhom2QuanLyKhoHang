<?php

use App\Models\InboundShipment;
use App\Models\Product;
use App\Models\Shelf;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inbound_shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Supplier::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Shelf::class)->nullable()->constrained()->nullOnDelete();
            $table->double('totalAmount');
            // sua sua null able
            $table->text('remarks')->nullable();
            $table->enum('status', ['active', 'draft'])->default('active');
            $table->timestamps();
        });

        Schema::create('inbound_shipment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(InboundShipment::class)->nullable()->constrained()->nullOnDelete();
            $table->integer('quantity');
            $table->double('unitPrice');
            $table->double('totalPrice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inbound_shipment_details');
        Schema::dropIfExists('inbound_shipments');

    }
};
