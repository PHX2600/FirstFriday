<?php
	echo(firstFriday(true));

	function firstFriday($formatted = false) {
		// firstFriday v0.2 by, Chris Kankiewicz (http://www.ChrisKankiewicz.com)
		 
		// Calculate next Friday timestamp
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
		 
		if ($formatted) {
			// Return date as "Month Day, Year" format
			return date("F j, Y", $firstFriday);
		} else {
			// Return next first Friday timestamp
			return $firstFriday;
		}
	}
?>