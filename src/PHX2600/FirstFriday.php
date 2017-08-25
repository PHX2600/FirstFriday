<?php

namespace PHX2600;

use Carbon\Carbon;

class FirstFriday
{
    /** @var string Timezone for date calculations */
    protected $timezone;

    /** @var Carbon instance to be used for "now" in date calculations */
    protected $now;

    /**
     * FirstFriday constructor method; runs on object creation.
     *
     * @param string $timezone String representation of a timezone to be used
     *                         for date calculations. See: http://bit.ly/php-tzs
     * @param Carbon $now      Carbon instance representing the value to be used
     *                         for "now" in date calculations
     */
    public function __construct($timezone, Carbon $now = null)
    {
        $this->timezone = $timezone;

        if (isset($now)) {
            Carbon::setTestNow($now);
        }
    }

    /**
     * Calculate the next first Friday of the month.
     *
     * @return Carbon instance representing the next first Friday
     */
    public function next()
    {
        $firstFriday = new Carbon('first friday of this month', $this->timezone);

        if (Carbon::now()->gt($firstFriday)) {
            return new Carbon('first friday of next month', $this->timezone);
        }

        return $firstFriday;
    }

    /**
     * Calculate the previous first Friday of the month.
     *
     * @return Carbon instance representing the previous first Friday
     */
    public function previous()
    {
        $firstFriday = new Carbon('first friday of this month', $this->timezone);

        if (Carbon::now()->lte($firstFriday)) {
            return new Carbon('first friday of last month', $this->timezone);
        }

        return $firstFriday;
    }

    /**
     * Override the value to be used for "now" in date calculations.
     *
     * @param Carbon $now Carbon instance representing the value to be used
     *                      for "now" in date calculations
     *
     * @return FirstFriday
     */
    public function overrideToday(Carbon $now)
    {
        return new static($this->timezone, $now);
    }
}
