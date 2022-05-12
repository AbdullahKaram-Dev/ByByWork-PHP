<?php

/** to get time zone of your system */
echo date_default_timezone_get()."<br>";

/** to set time zone of your system */
date_default_timezone_set('Africa/Cairo');
echo date_default_timezone_get()."<br>";


/** function time stamp */
$time = time();

/** get date (specific format from current time) */
$dateFromTime = date('Y-m-d h:i:s',$time);


echo $time." current time<br>";


echo $dateFromTime."<br>";

$futureTime = $time + (30 * 24 * 60 * 60);
echo $futureTime." future time<br>";

echo date('Y-m-d h:i:s',$futureTime)."<br>";

/** to generate time from (hour,minute,second,month,day,year) */

echo mktime(hour:12,minute: 30,second: 30,month: 6,day: 5,year: 2022)."<br>";

echo date('Y-m-d h:i:s A',strtotime('2022-5-6 22:00:00'))."<br>";


echo date('Y-m-d h:i:s A',strtotime('tomorrow'))."<br>";

echo date('Y-m-d h:i:s A',strtotime('first day of march'))."<br>";

echo date('Y-m-d h:i:s A',strtotime('last day of march'))."<br>";

echo date('Y-m-d h:i:s A',strtotime('last day of march 2021'))."<br>";


echo date('Y-m-d h:i:s A',strtotime('second friday of january 2021'))."<br>";

$date = date("Y-m-d",strtotime("+30 day"));

echo "<pre>";
print_r(date_parse($date));
echo "</pre>";

echo "<pre>";
print_r(date_parse_from_format("Y-m-d h:i:s",$date));
echo "</pre>";