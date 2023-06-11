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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('slug');
            $table->bigInteger('category_id')->unsigned();
            $table->boolean('is_active')->default(0);
            $table->decimal('price',10,2);
            $table->boolean('special_price')->default(0);
            $table->decimal('special_price_value',10,2)->nullable();
            $table->string('title');
            $table->string('author');
            $table->string('nbr_page');
            $table->string('year');
            $table->string('binding_type');
            $table->string('edition_number');
            $table->string('imprint_color');
            $table->string('size');
            $table->string('edition')->nullable();
            $table->string('weight');
            $table->string('barcode');
            $table->string('contents')->nullable();
            $table->string('file')->nullable();
            $table->string('cover')->nullable();
            $table->text('description')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
