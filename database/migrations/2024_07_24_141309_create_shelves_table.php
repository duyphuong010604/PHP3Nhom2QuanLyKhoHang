<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shelves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('section');
            $table->integer('capacity')->default(10)->change(); 
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inbound_shipment_details'); // Ví dụ nếu có bảng liên quan

        // Sau đó xóa bảng chính
        Schema::dropIfExists('inbound_shipments');
    
        // Xóa bảng con liên quan khác
        Schema::dropIfExists('shelves');
    }
};
