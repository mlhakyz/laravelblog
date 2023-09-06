<?php

use App\Models\Category;
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
        // add_category_id_to_posts_table
        Schema::table('posts', function (Blueprint $table) {
            $table->after('id', function (Blueprint $table) {
                $table->foreignIdFor(Category::class)
                    ->constrained()
                    ->cascadeOnDelete(); // kategori silinince bağlı olanları da sil
                
                /*
                $table->bigInteger('category_id')->unsigned();

                $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->cascadeOnDelete();
                */
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(Category::class);
        });
    }
};
