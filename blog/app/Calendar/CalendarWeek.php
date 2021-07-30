<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarWeek
{
    private $carbon;

	function __construct($date, $counter = 1)
	{
		$this->carbon = new Carbon($date);
		$this->counter = $counter - 1;
		
	}
	
	private function createCalendar()
	{
	    $weeks = [];
	    $week = [];
	    
	    $firstDay = $this->carbon->copy()->firstOfMonth();
	    $lastDay = $this->carbon->copy()->lastOfMonth();
	
	    $tmp = $firstDay->copy()->startOfWeek()->subDay();
	    $last = $lastDay->copy()->endOfWeek()->subDay();
	    
	    if($tmp->copy()->addDays(7)->format('j') == '1')
	    {
	    	$tmp->addDays(7);
	    }

	    while($tmp->lte($last))
	    {
	       
	        $week[] = $tmp->copy();
	        
	        if(count($week) == 7)
	        {
	            $weeks[] = $week;
	            $week = [];
	        }
	        
	        $tmp->addDay(1);
	        
	    }
	    
	    return $weeks;
	}
	
	public function getWeekTitle()
	{
	    $MonthDays = $this->createCalendar();
	    
		if((0 <= $this->counter) and ($this->counter < count($MonthDays))){
	    	$WeekDay = $MonthDays[$this->counter];
	    }else{
	    	$WeekDay = $MonthDays[0];
	    }
	    return $WeekDay[0]->format('n/j') . '~' . $WeekDay[6]->format('n/j');
	}
	
	public function getWeekDays()
	{
	    $MonthDays = $this->createCalendar();
	    
	    if((0 <= $this->counter) and ($this->counter < count($MonthDays))){
	    	return $MonthDays[$this->counter];
	    }else{
	    	return $MonthDays[0];
	    }
	}
	
	public function getMonthDays()
	{
		return $this->createCalendar();
	}
	
	public function getUrl()
	{
	    return $this->carbon;
	}
	
	public function getMonthTitle()
	{
	    return $this->carbon->format('Y年n月');
	}
}