<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigSmtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('config_smtps')) {
            Schema::create('config_smtps', function (Blueprint $table) {
                $table->id();
                $table->boolean('is_verified')->nullable()->comment('czy poprawne');
                $table->string('host')->nullable()->comment('host smtp');
                $table->string('port')->nullable()->comment('port');
                $table->string('username')->nullable()->comment('użytkownik');
                $table->string('password')->nullable()->comment('hasło');
                $table->string('encryption')->nullable()->comment('szyfrowanie tls');
                $table->string('from_email')->nullable()->comment('email');
                $table->string('from_name')->nullable()->comment('nazwa');
                $table->dateTime('verified_at')->nullable()->comment('zweryfikowano');
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
        Schema::dropIfExists('config_smtps');
    }
}
