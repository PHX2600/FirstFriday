<?php

    namespace FirstFriday;

    /**
     * Calculate the next, first Friday of the month.
     *
     * This software is liscensed under the MIT License.
     * More info available at https://github.com/PHX2600/FirstFriday
     *
     * @author Chris Kankiewicz (http://www.chriskankiewicz.com)
     * @copyright 2013 Chris Kankiewicz
     */
    class FirstFriday {

        // Define application version
        const VERSION = '1.3.0-dev';

        /**
         * Calculate timestamp or for the next, first Friday ofthe month
         *
         * @return string Unix timestamp of the next first Friday
         * @access public
         */
        public function getTimeStamp() {

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
         * @access public
         */
        public function getFormatted($format = "F j, Y") {

            // Return formatted date
            return date($format, $this->getTimeStamp());

        }

    }
?>
