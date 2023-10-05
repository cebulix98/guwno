<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderTransactionAddColumnTotalPriceBrutto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table_name = 'order_transactions';

        if (Schema::hasTable($table_name)) {
            if (!Schema::hasColumn($table_name, 'total_price_brutto')) {
                Schema::table($table_name, function (Blueprint $table) {
                    $table->decimal('total_price_brutto')->nullable()->comment('calkowita wartosc brutto');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
