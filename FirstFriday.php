<?php
    /**
     * Calculates and returns a timestamp or formatted text for the next,
     * first Friday of the month.
     *
     * This software is liscensed under the MIT License. 
     * More info available at https://github.com/PHX2600/FirstFriday
     *
     * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
     * @copyright 2012 Chris Kankiewicz
     */
    class FirstFriday {
        
        // Define application version
        const VERSION = '1.2.0';
        
        /**
         * Main first Friday function. 
         * 
         * @param string|boolean $format PHP date format string or boolean FALSE for unix time stamp. Default value = "F j, Y"
         * @return string Formatted string of the next first Friday
         * @access public
         */
        public function firstFriday($format = "F j, Y") {
            
            if ($format !== false) {
                return $this->_firstFridayFormatted($format);
            } else {
                return $this->_firstFridayStamp();
            }
            
        }
        
        /**
         * Calculates and returns a timestamp or for the next,
         * first Friday of the month.
         * 
         * @return string Unix timestamp of the next first Friday
         * @access private
         */
        private function _firstFridayStamp() {
            
            // Calculate first Friday of this month
            $thisFirstFriday = strtotime('first friday of this month');
            
            if (date('d') > date('d', $thisFirstFriday)) {
                // Calculate first Friday of next month
                $nextFirstFriday = strtotime('first friday of next month');
                $firstFriday = $nextFirstFriday;
            } else {
                // Set the next first Friday
                $firstFriday = $thisFirstFriday;
            }
            
            // Return next first Friday timestamp
            return $firstFriday;
            
        }
        
        /**
         * Returns formatted string of the next first Friday
         * 
         * @param $format PHP date format string
         * @return string Formatted string of the next first Friday
         * @access private
         */
        private function _firstFridayFormatted($format) {
            
            // Return formatted date
            return date($format, $this->_firstFridayStamp());
            
        }
        
    }
?>
