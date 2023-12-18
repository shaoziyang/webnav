<?php

$base_path = dirname(__DIR__);
$diary = $base_path.'/datasets/diary/diary.txt';
$diary_tmp = $base_path.'/datasets/diary/diary.tmp';

$mode = 'day';
if(isset($_GET['mode']))
	$mode = $_GET['mode'];

if (!file_exists($diary))
	exit('学而时习之，不亦说乎');

$lines = file($diary, FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
$nl = count($lines);

if ($nl == 0)
	exit('学而时习之，不亦说乎');

if ($mode == 'day') {
	$day = -1;
	$n = rand(0, $nl);
	$new = true;
	if (file_exists($diary_tmp)) {
		$tmp = file($diary_tmp);
		if (count($tmp) > 1) {
			try {
				$day = $tmp[0];
				$n = round($tmp[1])%$nl;
				$new = ($day != date('d'));
			} catch(error $e) {
			}
		}
	}
	if($new) {
		if ($nl > 1) {
			$x = $n;
			while ($x == $n)
				$n = rand(0, $nl);
		}
		$fp = fopen($diary_tmp, "w+");
		if ($fp) {
			$canWrite = false;
			while (!$canWrite)
				$canWrite = flock($fp, LOCK_EX);

			fwrite($fp, date('d').PHP_EOL.$n.PHP_EOL);
			flock($fp, LOCK_UN);
			fclose($fp);
		}
	}

	echo $lines[$n];
}
else {
	echo $lines[rand(0, $nl)];
}

?>
