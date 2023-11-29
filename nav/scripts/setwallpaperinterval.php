<?php

$base_path = dirname(__DIR__);
$file_cfg = $base_path.'/scripts/wallpaper.txt';

$DT_NEW = round($_GET['time']);

$DT = 86400;
$time_last = 0;
$image = '';

if (file_exists($file_cfg)) {
	$c_file = array();
	$fp = fopen($file_cfg, "r");

	if ($fp) {
		$canWrite = false;
		while (!$canWrite)
			$canWrite = flock($fp, LOCK_EX);

		while (!feof($fp)) {
			$line = trim(fgets($fp, 1024));
			if ($line != "")
				$c_file[] = $line;
		}
		flock($fp, LOCK_UN);
		fclose ($fp);
	}

	if (sizeof($c_file) > 0)
		list($DT, $time_last, $image) = explode("||", $c_file[0]);

}


$fp = fopen($file_cfg, "w+");
if ($fp) {
	$canWrite = false;
	while (!$canWrite)
		$canWrite = flock($fp, LOCK_EX);

	fwrite($fp, $DT_NEW.'||'.time().'||'.$image);
	flock($fp, LOCK_UN);
	fclose($fp);
}

echo "<script>history.back();</script>";
?>