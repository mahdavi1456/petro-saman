<?php
class gt_date{

    public function add_to_date($date, $days){
        return date('Y-m-d', strtotime($date . " + " . $days . " day"));
    }
	
	public function time_diff($time2, $time1){
		$diff = strtotime($time2) - strtotime($time1);
		return round($diff / 86400, 0, 1);
	}
	
}