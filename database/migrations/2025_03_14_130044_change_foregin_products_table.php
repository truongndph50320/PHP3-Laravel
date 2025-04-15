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
        Schema::table('products',function(Blueprint $table){
            // thay đổi kiểu dữ liệu price
            $table->foreignId('category_id')->change()->constrained('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products',function(Blueprint $table){
            // thay đổi kiểu dữ liệu price
            $table->dropForeign('products_category_id_foreign');
        });
    }
};
