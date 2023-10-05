<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotionFieldRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('motion_field_relations')) {
            Schema::create('motion_field_relations', function (Blueprint $table) {
                $table->id();

                $table->bigInteger('motion_id')->nullable()->unsigned()->comment('wniosek');
                $table->foreign('motion_id')->references('id')->on('motions')->onDelete('cascade');

                $table->bigInteger('field_id')->nullable()->unsigned()->comment('pole');
                $table->foreign('field_id')->references('id')->on('motion_fields')->onDelete('cascade');

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
        Schema::dropIfExists('motion_field_relations');
    }
}
