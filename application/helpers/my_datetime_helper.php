<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('relative_time'))
{
    function relative_time($datetime)
    {
        $CI =& get_instance();
        $CI->lang->load('date');
        
        if(!is_numeric($datetime))
        {
            $val = explode(" ",$datetime);
           $date = explode("-",$val[0]);
           $time = explode(":",$val[1]);
           $datetime = mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
        }
        
        $difference = time() - $datetime;
        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");

        if ($difference > 0) 
        { 
            $ending = $CI->lang->line('date_ago');
        } 
        else 
        { 
            $difference = -$difference;
            $ending = $CI->lang->line('date_to_go');
        }
        for($j = 0; $difference >= $lengths[$j]; $j++)
        {
            $difference /= $lengths[$j];
        } 
        $difference = round($difference);
        
        if($difference != 1) 
        { 
            $period = strtolower($CI->lang->line('date_'.$periods[$j].'s'));
        } else {
            $period = strtolower($CI->lang->line('date_'.$periods[$j]));
        }
        
        return "$difference $period $ending";
    }
        
    
}



/**
 * Function to display the elapsed time in sec, mins, hours, days ago etc
 * Passed date time should be in the order of 'Y-m-d H:i:s'
 *
 * @param datetime $passed_time
 * @return string
 *
 * @see check for the default datetime zone settings using this function date_default_timezone_get();
 * @see set the datetime zone using this example date_default_timezone_set('America/Los_Angeles');
 * @version 1.0
 */
function get_elapsed_time($passed_time=''){
	//Check for the empty passed time value
	if(!empty($passed_time)){
		//get the current date time.
		$start_date          = new DateTime(date("Y-m-d H:i:s"));
		//print_r($start_date);
		//echo $passed_time;
		//Calculate the date difference in terms of "sec", "mins", "hours", "days" ago etc
		$since_start      = $start_date->diff(new DateTime($passed_time));
		//print_r($since_start);
		if($since_start->y != 0){
			if($since_start->y == 1){
				return $since_start->y.' year ago';
			}else{
				return $since_start->y.' years ago';
			}
		}
		if($since_start->y == 0 && $since_start->m != 0){
			if($since_start->m == 1){
				return $since_start->m.' month ago';
			}else{
				return $since_start->m.' months ago';
			}
		}
		if($since_start->y == 0 && $since_start->m == 0 && $since_start->d != 0){
			if($since_start->d == 1){
				return $since_start->d.' day ago';
			}
			else{
				return $since_start->d.' days ago';
			}
		}
		if($since_start->y == 0 && $since_start->m == 0 && $since_start->d == 0 && $since_start->h != 0){
			if($since_start->h == 1){
				return $since_start->h.' hour ago';
			}else{
				return $since_start->h.' hours ago';
			}
		}
		if($since_start->y == 0 && $since_start->m == 0 && $since_start->d == 0 && $since_start->h == 0 && $since_start->i != 0){
			if($since_start->i == 1){
				return $since_start->i.' minute ago';
			}else{
				return $since_start->i.' minutes ago';
			}
		}
		if($since_start->y == 0 && $since_start->m == 0 && $since_start->d == 0 && $since_start->h == 0 && $since_start->i == 0 && $since_start->s != 0){
			if($since_start->s == 1){
				return $since_start->s.' second ago';
			}else{
				return $since_start->s.' seconds ago';
			}
		}
		if($since_start->y == 0 && $since_start->m == 0 && $since_start->d == 0 && $since_start->h == 0 && $since_start->i == 0 && $since_start->s == 0){
			return 'few second ago';
		}
	}else{
		return 'Invalid time';
	}
}	
	