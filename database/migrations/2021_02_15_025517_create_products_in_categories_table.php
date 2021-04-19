<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsInCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_in_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('id_category');
            $table->integer('id_menu_product');
            $table->integer('category_firestore_reference');
            $table->integer('menu_product_firestore_reference');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_in_categories');
    }
}
