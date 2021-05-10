<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryItemEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_item_entries', function (Blueprint $table) {
            $table->id();
            $table->integer('id_inventory');
            $table->integer('id_supplier');
            $table->float('purchase_price');
            $table->string('code')->nullable();          
            $table->float('quantity')->default(0); 
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('inventory_item_entries');
    }
}
