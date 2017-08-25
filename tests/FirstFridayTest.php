<?php

use Carbon\Carbon;
use PHX2600\FirstFriday;

class FirstFridayTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->firstFriday = new FirstFriday('America/Phoenix');
    }

    public function test_it_returns_an_instance_of_carbon()
    {
        $this->assertInstanceOf(Carbon::class, $this->firstFriday->next());
        $this->assertInstanceOf(Carbon::class, $this->firstFriday->previous());
    }

    public function test_it_can_calculate_the_next_first_friday()
    {
        $firstFriday = $this->firstFriday->overrideToday(
            Carbon::create(2017, 7, 1, 0, 0, 0, 'America/Phoenix')
        )->next();

        $this->assertEquals('2017-07-07', $firstFriday->toDateString());
    }

    public function test_it_can_calculate_the_next_first_friday_if_today_is_a_first_friday()
    {
        $firstFriday = $this->firstFriday->overrideToday(
            Carbon::create(2017, 7, 7, 0, 0, 0, 'America/Phoenix')
        )->next();

        $this->assertEquals('2017-07-07', $firstFriday->toDateString());
    }

    public function test_it_can_calculate_the_previous_first_friday()
    {
        $firstFriday = $this->firstFriday->overrideToday(
            Carbon::create(2017, 7, 1, 0, 0, 0, 'America/Phoenix')
        )->previous();

        $this->assertEquals('2017-06-02', $firstFriday->toDateString());
    }

    public function test_it_can_calculate_the_previous_first_friday_if_today_is_a_first_friday()
    {
        $firstFriday = $this->firstFriday->overrideToday(
            Carbon::create(2017, 7, 7, 0, 0, 0, 'America/Phoenix')
        )->previous();

        $this->assertEquals('2017-06-02', $firstFriday->toDateString());
    }
}
