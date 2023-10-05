<?php

namespace App\Http\Columns;

use App\Models\System\SystemCounter;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/** db model creator */
class SystemColumn
{
    public const SYSTEM_COUNTERS = ['name', 'description', 'count', 'next_number', 'year', 'default_number', 'count_default', 'number_prefix'];

    public static function CheckColumnSystemCounter($attribute)
    {
        Schema::table('system_counters', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('nazwa');
                    break;
                case 'description':
                    $table->string('description')->nullable()->comment('za co');
                    break;
                case 'count':
                    $table->bigInteger('count')->nullable()->comment('licznik');
                    break;
                case 'count_default':
                    $table->bigInteger('count_default')->nullable()->comment('licznik domyslny');
                    break;
                case 'next_number':
                    $table->string('next_number')->nullable()->comment('nastepny numer');
                    break;
                case 'default_number':
                    $table->string('default_number')->nullable()->comment('numer domyslny (numer dla 1 tranzakcji w roku)');
                    break;
                case 'number_prefix':
                    $table->string('number_prefix')->nullable()->comment('przedrostek do numeru');
                    break;
                case 'year':
                    $table->string('year')->nullable()->comment('obecny rok');
                    break;
            }
        });
    }
}
