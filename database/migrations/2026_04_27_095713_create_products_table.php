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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name" , 55);
            $table->decimal('price', 10, 2);
            $table->string("image");
            $table->string("size" , 55)->nullable();
        
            $table->foreignId("category_id")        // forien key
                    ->nullable()                    // aply null
                    ->constrained("categories")     // to table name
                    ->nullOnDelete();               // set null if delete
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
