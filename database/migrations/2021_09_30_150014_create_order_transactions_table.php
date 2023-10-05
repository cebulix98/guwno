<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('order_transactions')) {
            Schema::create('order_transactions', function (Blueprint $table) {
                $table->id();

                $table->bigInteger('order_id')->nullable()->unsigned()->comment('zamowienie');
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

                $table->bigInteger('status_id')->nullable()->unsigned()->comment('status');
                $table->foreign('status_id')->references('id')->on('dictionary_payment_statuses')->onDelete('cascade');

                $table->string('title')->nullable();
                $table->string('crc')->nullable();
                $table->string('payer_name')->nullable();
                $table->string('payer_email')->nullable();
                $table->decimal('total_price_netto')->nullable()->comment('calkowita wartosc netto');
                $table->string('result_url')->nullable()->comment('zwrotna strona url');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_transactions');
    }
}
