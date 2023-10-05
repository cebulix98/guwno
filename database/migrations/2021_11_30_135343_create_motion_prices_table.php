<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotionPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('motion_prices')) {
            Schema::create('motion_prices', function (Blueprint $table) {
                $table->id();

                $table->bigInteger('motion_id')->nullable()->unsigned()->comment('wniosek');
                $table->foreign('motion_id')->references('id')->on('motions')->onDelete('cascade');

                $table->bigInteger('origin_id')->nullable()->unsigned()->comment('web');
                $table->foreign('origin_id')->references('id')->on('dictionary_webs')->onDelete('cascade');

                $table->decimal('single_price_netto')->nullable()->comment('cena netto');
                $table->decimal('single_price_brutto')->nullable()->comment('cena brutto');
                $table->decimal('total_price_netto')->nullable()->comment('cena netto');
                $table->decimal('total_price_brutto')->nullable()->comment('cena brutto');
                $table->decimal('vat_rate')->nullable()->comment('stawka vat');
                $table->decimal('discount')->nullable()->comment('rabat');
                $table->boolean('discount_is_percentage')->nullable()->comment('rabat procentowy');

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
        Schema::dropIfExists('motion_prices');
    }
}
