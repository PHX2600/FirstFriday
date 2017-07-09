FirstFriday.php
===============

[![Latest Stable Version](https://img.shields.io/packagist/v/PHX2600/FirstFriday.svg)](https://packagist.org/packages/PHX2600/FirstFriday)
[![Total Downloads](https://img.shields.io/packagist/dt/PHX2600/FirstFriday.svg)](https://packagist.org/packages/PHX2600/FirstFriday)
[![Author](https://img.shields.io/badge/author-Chris%20Kankiewicz-blue.svg)](https://www.ChrisKankiewicz.com)
[![License](https://img.shields.io/packagist/l/PHX2600/FirstFriday.svg)](https://packagist.org/packages/PHX2600/FirstFriday)
[![Build Status](https://img.shields.io/travis/PHX2600/FirstFriday.svg)](https://travis-ci.org/PHX2600/FirstFriday)

Introduction
------------

Calculates the next and previous, first Friday of the month.

Like this project? Keep me caffeinated by [making a donation](https://paypal.me/ChrisKankiewicz).

Requirements
------------

  - [PHP](https://php.net) >= 5.6

Install with Composer
---------------------

```bash
composer require phx2600/firstfriday
```

Usage
-----

First, import FirstFriday:

```php
use PHX2600/FirstFriday;
```

Then instantiate the class:

```php
$firstFriday = new FirstFriday($timezone);
```

Where `$timezone` is a String representation of a timezone to be used for date
calculations. For example `America/Phoenix`, `Antarctica/Troll` or `UTC`.  See
http://bit.ly/php-tzs for a full list of available timezones.

Once your class is instantiated you can get the next first Friday of the month
via the `next()` method:

```php
$nextFirstFriday = $firstFriday->next();
```

or the previous first Friday via the `previous()` method:

```php
$previousFirstFriday = $firstfriday->previous();
```

Both the `next()` and the `previous()` methods return an instance of
[Carbon](http://carbon.nesbot.com/). This makes date calculations and returning
specific date information easy. For example:

**Return a pre-formatted date string:**

```php
$nextFirstFriday->toDateString();           // 1975-12-25
$nextFirstFriday->toFormattedDateString();  // Dec 25, 1975
$nextFirstFriday->toDateTimeString();       // 1975-12-25 14:15:16
$nextFirstFriday->toDayDateTimeString();    // Thu, Dec 25, 1975 2:15 PM
```

**Return a custom formatted string:**

```php
$nextFirstFriday->format('l jS \\of F Y h:i:s A');  // Thursday 25th of December 1975 02:15:16 PM
```

**Get the time until the next first Friday in human a human readable format:**

```php
$nextFirstFriday->diffForHumans();  // Something like '1 week from now' or '1 month from now'
```

**Cabon also provides a number of convinient comparison functions, for example:**

```php
// The following return boolean true or false
$firstFriday->isToday();
$firstFriday->isYesterday();
$firstFriday->isTomorrow();
$firstFriday->isFuture();
$firstFriday->isPast();
```

See the [Carbon documentation](http://carbon.nesbot.com/docs/) for more details.

---

You may also override the value used as "today" in the date calculations. This
will allow you to make calculations as if today were another day. This can be
accomplished by passing an instance of Carbon as the second parameter when
instantiating the FirstFriday class:

```php
$today = Carbon::create(2017, 7, 1, 0, 0, 0, 'America/Phoenix');
$firstFriday = new FirstFriday('America/Phoenix', $today);
```

or fluently:

```php
$firstFriday = new FirstFriday('America/Phoenix');
$today = Carbon::create(2017, 7, 1, 0, 0, 0, 'America/Phoenix');

$firstFriday->overrideToday($today)->next();
```

**NOTE:** Be sure to set the timezone of the `$today` parameter to the same
timezone passed to the `$timezone` argument of the FirstFriday class to ensure
consistency in date calculations. Failing to do so may cause unexpected results.

Troubleshooting
---------------

Please report bugs to the [GitHub Issue Tracker](https://github.com/PHX2600/FirstFriday/issues).

Copyright
---------

This project is liscensed under the [MIT License](https://github.com/PHX2600/FirstFriday/blob/master/LICENSE).
