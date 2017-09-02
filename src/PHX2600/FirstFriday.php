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
        $this->now = $now ?: Carbon::now($timezone);
    }

    /**
     * Calculate the next first Friday of the month.
     *
     * @return Carbon instance representing the next first Friday
     */
    public function next()
    {
        $firstFriday = new Carbon(sprintf(
            'first friday of %s %s',
            $this->now->format('F'),
            $this->now->format('Y')
        ), $this->timezone);

        if ($this->now->gt($firstFriday)) {
            $this->now->addMonth();

            return new Carbon(sprintf(
                'first friday of %s %s',
                $this->now->format('F'),
                $this->now->format('Y')
            ), $this->timezone);
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
        $firstFriday = new Carbon(sprintf(
            'first friday of %s %s',
            $this->now->format('F'),
            $this->now->format('Y')
        ), $this->timezone);

        if ($this->now->lte($firstFriday)) {
            $this->now->subMonth();

            return new Carbon(sprintf(
                'first friday of %s %s',
                $this->now->format('F'),
                $this->now->format('Y')
            ), $this->timezone);
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
