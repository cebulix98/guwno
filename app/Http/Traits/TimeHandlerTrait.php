<?php

namespace App\Http\Traits;

use Carbon\Carbon;

trait TimeHandlerTrait
{

    /**
     * get time to minutes
     *
     * @param string $time
     * @return int
     */
    public function GetTimeToMinutes($time)
    {
        if ($time != null) {
            $time = Carbon::parse($time);
            $hours = $time->hour;
            $minutes = $time->minute;

            $final = $hours * 60 + $minutes;

            return $final;
        }
    }

    /**
     * get time to minutes
     *
     * @param string $time
     * @return int
     */
    public function GetTimeToSeconds($time)
    {
        if ($time != null) {
            $time = Carbon::parse($time);
            $hours = $time->hour;
            $minutes = $time->minute;
            $seconds = $time->second;

            $in_minutes = $hours * 60 + $minutes;

            $final = $in_minutes * 60 + $seconds;

            return $final;
        }
    }

    /**
     * get minutes to time
     *
     * @param int $minutes
     * @return Carbon
     */
    public function GetMinutesToTime($minutes)
    {
        $hours = floor($minutes / 60);
        $minutes = ($minutes % 60);

        $time = Carbon::createFromTime($hours, $minutes, 0);

        return $time;
    }

    /**
     * get seconds to time
     *
     * @param int $seconds
     * @return Carbon
     */
    public function GetSecondsToTime($seconds)
    {
        $minutes = floor($seconds / 60);
        $seconds = ($seconds % 60);

        $hours = floor($minutes / 60);
        $minutes = ($minutes % 60);

        $time = Carbon::createFromTime($hours, $minutes, $seconds);

        return $time;
    }

    /**
     * parse time from hours minutes seconds
     *
     * @param int $hours
     * @param int $minutes
     * @param int $seconds
     * @return Carbon
     */
    public function ParseTime($hours, $minutes, $seconds)
    {
        if ($hours == null) $hours = 0;
        if ($minutes == null) $minutes = 0;
        if ($seconds == null) $seconds = 0;

        $minutes_from_seconds = floor($seconds / 60);
        $seconds = ($seconds % 60);

        $minutes += $minutes_from_seconds;

        $hours_from_minutes = floor($minutes / 60);
        $minutes = ($minutes % 60);

        $hours += $hours_from_minutes;

        $time = Carbon::createFromTime($hours, $minutes, $seconds);

        return $time;
    }

    /**
     * get time array (h,i,s)
     *
     * @param string $time
     * @return array
     */
    public function GetTimeArray($time)
    {
        if ($time == null) return array(0, 0, 0);

        $time = Carbon::parse($time);
        $hours = $time->hour;
        $minutes = $time->minute;
        $seconds = $time->second;

        $array = [$hours, $minutes, $seconds];

        return $array;
    }

    /**
     * translate time array to seconds
     *
     * @param array $time
     * @return int
     */
    public function GetTimeArrayToSeconds(array $time)
    {
        $seconds = 0;
        if (is_array($time)) {
            $minutes = $time[0] * 60 + $time[1];
            $seconds = $minutes * 60 + $time[2];
        }

        return $seconds;
    }

    /**
     * translate hours to seconds
     *
     * @param float $hours
     * @return int
     */
    public function GetHoursToSeconds($hours)
    {
        $minutes = $hours * 60;
        $seconds = $minutes * 60;

        return $seconds;
    }

    public function GetPrettyTimeDifferece(Carbon $start, Carbon $end)
    {
        $days = $this->GetDifferenceInDays($start, $end);

        if ($days != 0) return $days .= ' dni';

        $hours = $this->GetDifferenceInHours($start, $end);

        if ($hours != 0) return $hours .= ' godzin';

        $minutes = $this->GetDifferenceInMinutes($start, $end);

        if ($minutes != 0) return $minutes .= ' minut';
    }

    public function GetDifferenceInDays(Carbon $start, Carbon $end)
    {
        $difference = $end->diffInDays($start);
        return $difference;
    }

    public function GetDifferenceInHours(Carbon $start, Carbon $end)
    {
        $difference = $end->diffInHours($start);
        return $difference;
    }

    public function GetDifferenceInMinutes(Carbon $start, Carbon $end)
    {
        $difference = $end->diffInMinutes($start);
        return $difference;
    }
}
