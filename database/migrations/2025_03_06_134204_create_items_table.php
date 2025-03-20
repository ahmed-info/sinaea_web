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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->cascadeOnDelete();
            $table->double('cost_price');
            $table->double('user_price'); // used when user role 0
            $table->double('supplier_price'); // used when user role 1
            $table->boolean('isDollar')->default(false); // used to determine the currency in IQD or the price * dollar value
            $table->double('discount')->nullable();
            $table->boolean('active')->default(true); // used to show/hide the item
            $table->boolean('available')->default(true); // used to make it availble/unavailble for purchase
            $table->foreignId('dollar_id')->default(1)->constrained('dollars')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
