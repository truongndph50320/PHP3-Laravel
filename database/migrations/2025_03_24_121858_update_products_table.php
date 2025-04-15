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
        Schema::table('products', function (Blueprint $table) {
            // Nếu đã có cột category_id, thì thêm ràng buộc khóa ngoại
            if (Schema::hasColumn('products', 'category_id')) {
                $table->dropForeign(['category_id']); // Xóa FK cũ (nếu có)
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Xóa ràng buộc cascade nếu rollback
            $table->dropForeign(['category_id']);
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }
};
