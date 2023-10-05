<?php

namespace App\Http\Creators;

use App\Models\System\SystemCounter;
use App\Models\System\SystemResponseFooter;
use Carbon\Carbon;

/** db model creator */
class SystemCreator
{

    /**
     * create SystemIdCount
     *
     * @param string $name
     * @param string $description
     * @param int $count
     * @param string $next_number
     * @param string $default_number
     * @param int $count_default
     * @return SystemCounter
     */
    public static function CreateSystemCounter($name, $description, $count, $next_number, $default_number, $count_default)
    {
        $model = SystemCounter::create([
            'name' => $name,
            'description' => $description,
            'count' => $count,
            'next_number' => $next_number,
            'year' => Carbon::now()->format('Y'),
            'default_number' => $default_number,
            'count_default' => $count_default,
            'number_prefix' => Carbon::now()->format('y')
        ]);

        return $model;
    }

    /**
     * create model
     *
     * @param string $code
     * @param boolean $is_primary
     * @param string $content
     * @return SystemResponseFooter
     */
    public static function CreateSystemResponseFooter($code, $is_primary, $content = null)
    {
        $model = SystemResponseFooter::create([
            'code' => $code,
            'content' => $content,
            'is_primary' => $is_primary
        ]);

        return $model;
    }
}
