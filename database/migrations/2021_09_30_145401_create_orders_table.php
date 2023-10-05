<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();

                $table->string('code')->nullable()->comment('numer zamowienia');

                $table->bigInteger('case_id')->nullable()->unsigned()->comment('sprawa');
                $table->foreign('case_id')->references('id')->on('case_cases')->onDelete('cascade');

                $table->bigInteger('status_id')->nullable()->unsigned()->comment('status');
                $table->foreign('status_id')->references('id')->on('dictionary_payment_statuses')->onDelete('cascade');

                $table->bigInteger('user_id')->nullable()->unsigned()->comment('uzytkownik');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                $table->string('payer_name')->nullable();
                $table->string('payer_email')->nullable();

                $table->decimal('total_price_brutto')->nullable()->comment('calkowita wartosc brutto');
                $table->decimal('total_price_netto')->nullable()->comment('calkowita wartosc netto');
                $table->decimal('price_vat_rate')->nullable()->comment('stawka vat');
                $table->decimal('price_netto')->nullable()->comment('wartosc netto');
                $table->decimal('price_discount')->nullable()->comment('znizka');

                $table->decimal('total_paid')->nullable()->comment('ile zaplacono');
                $table->decimal('total_to_pay')->nullable()->comment('ile do zaplaty');
                $table->date('date_payment')->nullable()->comment('data wplaty');

                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
