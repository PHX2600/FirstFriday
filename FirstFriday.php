<?php
    /**
     * Calculates and echos the next, first Friday of the month.
     *
     * This software is dual liscensed under the following licenses:
     *     MIT License https://github.com/PHX2600/first-friday/raw/COPYING-MIT
     *     GPL Version 3 https://github.com/PHX2600/first-friday/raw/COPYING-GPL
     *
     * More info available at https://github.com/PHX2600/first-friday
     *
     * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
     * @copyright 2011 Chris Kankiewicz
     */
    class FirstFriday {
        
        // Define application version
        const VERSION = '1.0.0-dev';
        
        /**
         * FirstFriday construct function. Runs on object creation.
         * @param boolean $formatted True = returns a formatted string. False = unix time stamp
         * @param string $format PHP date format string
         */
        public function firstFriday($formatted = true, $format = "F j, Y") {
            if ($formatted == true) {
                return $this->_firstFridayFormatted($format);
            } else {
                return $this->_firstFridayStamp();
            }
        }
        
        /**
         * Returns timestamp of the next first Friday
         * @return string Timestamp
         * @access private
         */
        private function _firstFridayStamp() {
            
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
            
            // Return next first Friday timestamp
            return $firstFriday;
            
        }
        
        /**
         * Returns formatted string of the next first Friday
         * @param $format PHP date format string
         * @access private
         */
        private function _firstFridayFormatted($format) {
            
            // Return formatted date
            return date($format, $this->_firstFridayStamp());
            
        }
        
    }
?>
