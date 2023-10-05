<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotionAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('motion_agreements')) {
            Schema::create('motion_agreements', function (Blueprint $table) {
                $table->id();
                
                $table->bigInteger('motion_id')->nullable()->unsigned()->comment('wniosek');
                $table->foreign('motion_id')->references('id')->on('motions')->onDelete('cascade');

                $table->bigInteger('agreement_id')->nullable()->unsigned()->comment('id zgody');
                $table->foreign('agreement_id')->references('id')->on('dictionary_agreements')->onDelete('cascade');

                $table->boolean('is_active')->nullable()->comment('aktywne');
                $table->boolean('is_required')->nullable()->comment('obowiazkowe');
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
        Schema::dropIfExists('motion_agreements');
    }
}
