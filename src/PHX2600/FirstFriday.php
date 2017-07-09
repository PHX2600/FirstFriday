<?php

namespace PHX2600;

use Carbon\Carbon;

class FirstFriday
{
    /** @var string Timezone for date calculations */
    protected $timezone;

    /** @var Carbon instance to be used for "today" in date calculations */
    protected $today;

    /**
     * FirstFriday constructor method; runs on object creation.
     *
     * @param string $timezone String representation of a timezone to be used
     *                         for date calculations. See: http://bit.ly/php-tzs
     * @param Carbon $today Carbon instance representing the value to be used
     *                      for "today" in date calculations
     */
    public function __construct($timezone, Carbon $today = null)
    {
        $this->timezone = $timezone;
        $this->today = isset($today) ? $today : Carbon::today($this->timezone);
    }

    /**
     * Calculate the next first Friday of the month.
     *
     * @return Carbon instance representing the next first Friday
     */
    public function next()
    {
        $firstFriday = new Carbon('first friday of this month', $this->timezone);

        if ($this->today->gt($firstFriday)) {
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

        if ($this->today->lte($firstFriday)) {
            return new Carbon('first friday of last month', $this->timezone);
        }

        return $firstFriday;
    }

    /**
     * Override the value to be used for "today" in date calculations.
     *
     * @param Carbon $today Carbon instance representing the value to be used
     *                      for "today" in date calculations
     *
     * @return PHX2600\FirstFriday
     */
    public function overrideToday(Carbon $today)
    {
        return new static($this->timezone, $today);
    }
}
