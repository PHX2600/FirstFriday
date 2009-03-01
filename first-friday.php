<?php // first-friday.php v0.1.3 by, Chris Kankiewicz <http://www.web-geek.net>

  // Calculate next Friday 
  for ($x = date('d'); $x <= (date('d') + 6); $x++) {
    $timeStamp = mktime(0,0,0,date('m'),$x,date('Y'));
    if (date('w',$timeStamp) == 5) {
      $nextFriday = mktime(0,0,0,date('m'),$x,date('Y'));
    }
  }
  // Check if next Friday is the first friday of the month.
  if (date('d', $nextFriday) <= 7) {
    $firstFriday = $nextFriday;
  } else {
  // Calculate first Friday of next month
    for ($x = 1; $x <= 7; $x++) {
      $timeStamp = mktime(0,0,0,date('m')+1,$x,date('Y'));
      if (date('w',$timeStamp) == 5) {
        $firstFriday = mktime(0,0,0,date('m')+1,$x,date('Y'));
      }
    }
  }

  // Echo next first Friday
  echo date("F j, Y", $firstFriday);

?>