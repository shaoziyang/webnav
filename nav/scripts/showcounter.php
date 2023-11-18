<?php
/*
Text Counter by http://www.free-php-counter.com
You are allowed to remove advertising after you purchased a licence
*/

$counter_filename = dirname(__FILE__)."/counter.txt";

// get basic information
$counter_ip = $_SERVER['REMOTE_ADDR'];
$counter_time = time();


if (file_exists($counter_filename))
{

   // get current counter state
   $c_file = array();
   $fp = fopen($counter_filename, "r");

   if ($fp)
   {
	  $canWrite = false;
      while (!$canWrite)
	     $canWrite = flock($fp, LOCK_EX);

	  while (!feof($fp))
      {
         $line = trim(fgets($fp, 1024));
		 if ($line != "")
		    $c_file[] = $line;
      }
      flock($fp, LOCK_UN);
	  fclose ($fp);
   }


  // get data for reading only
  if (sizeof($c_file) > 0)
     list($day_arr, $yesterday_arr, $week_arr, $month_arr, $year_arr, $all, $record, $record_time) = explode("||", $c_file[0]);
  else
     list($day_arr, $yesterday_arr, $week_arr, $month_arr, $year_arr, $all, $record, $record_time) = explode("||", date("z") . ":1||" . (date("z")-1) . ":0||" . date("W") . ":1||" . date("n") . ":1||" . date("Y") . ":1||1||1||" . $counter_time);

  // day
  $day_data = explode(":", $day_arr);
  $day = $day_data[1];

  // yesterday
  $yesterday_data = explode(":", $yesterday_arr);
  $yesterday = $yesterday_data[1];

  // week
  $week_data = explode(":", $week_arr);
  $week = $week_data[1];

  // month
  $month_data = explode(":", $month_arr);
  $month = $month_data[1];

  // year
  $year_data = explode(":", $year_arr);
  $year = $year_data[1];

  $record_time = trim($record_time);

  $online = sizeof($c_file) - 1;
  if ($online <= 0)
     $online = 1;

}
else
{
   // create counter file
   $add_line = date("z") . ":1||" . (date("z")-1) . ":0||" . date("W") . ":1||" . date("n") . ":1||" . date("Y") . ":1||1||1||" . $counter_time . "\n" . $counter_ip . "||" . $counter_time . "\n";

   // write counter data
   $fp = fopen($counter_filename,"w+");
   if ($fp)
   {
      //flock($fp, LOCK_EX);
	  $canWrite = false;
      while (!$canWrite)
	     $canWrite = flock($fp, LOCK_EX);

      fwrite($fp, $add_line);
	  flock($fp, LOCK_UN);
      fclose($fp);
   }

   // get counter values
   $yesterday = 0;
   $day = $week = $month = $year = $all = $record = 1;
   $record_time = $counter_time;
   $online = 1;
}
?>

<?php 
    $result = '<b>访问统计</b> 今天 <b><font color="#0080FF">'.$day.'</font></b>  &nbsp昨天 <b><font color="#A04020">'.$yesterday.'</font></b> &nbsp本周 <b><font color="#12CC22">'.$week.'</font></b> &nbsp本月 <b><font color="#CF8C52">'.$month.'</font></b> &nbsp今年 <b><font color="#801010">'.$year.'</font></b> &nbsp总共 <b><font color="#002288">'.$all.'</font></b>';
    echo $result;
?>
