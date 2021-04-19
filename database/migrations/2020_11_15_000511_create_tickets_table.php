<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->float('total')->nullable();
            $table->integer('table_number')->nullable();
            $table->string('folio');
            $table->float('recived_amount')->nullable();
            $table->float('cashback_amount')->nullable();
            $table->integer('id_user');
            $table->integer('id_cash_register');
            $table->integer('id_currency_recived')->nullable();
            $table->integer('id_currency_cashback')->nullable();
            $table->integer('id_payment_type')->nullable();
            $table->string('client_code')->nullable();
            $table->string('client_name')->nullable();
            $table->boolean('client_control')->nullable();
            $table->integer('id_satisfaction')->nullable();
            $table->integer('id_ticket_status')->default(1);
            $table->boolean('is_active');
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
        Schema::dropIfExists('tickets');
    }
}
