<?php

namespace App\Http\Checkers;

use App\Http\Columns\SystemColumn;
use App\Models\System\SystemCounter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

/** db model creator */
class SystemChecker
{

    public static function CheckSystemCounter()
    {
        $table_name = 'system_counters';
        $cols = SystemColumn::SYSTEM_COUNTERS;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    SystemColumn::CheckColumnSystemCounter($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }
}
