<?php

namespace Drupal\event_timers\Services;

use DateTime;
/*
 * EventRemainingTimeService is a simple 8 service.
 */
class GetDaysService
{
    /**
     * Constructs a new GetDaysService object.
     */
    public function __construct() {
    
    }
    
    /**
     * Returns message with number of days remaining until event start
     *
     * @param $date
     *
     * @return string
     * @throws \Exception
     */
    public function getRemainingDays($date)
    {
        $eventDate = new DateTime($date);
        
        $interval = date_create('now')->diff( $eventDate );
        
        if($interval->invert === 1) {
            
            $return = 'This event already passed.';
            
        } else if ($interval->d === 0 && $interval->h > 0) {
    
            $return = 'This event is happening today';
        } else {
    
            $return = $interval->days . ' days left until event starts';
        }
        
        return $return;
    }
}
