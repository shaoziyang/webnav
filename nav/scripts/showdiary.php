<?php

$mode = 'day';
if(isset($_GET['mode']))
	$mode = $_GET['mode'];

if (!file_exists('diary.txt'))
	exit('学而时习之，不亦说乎');

$lines = file('diary.txt', FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES);
$nl = count($lines);

if ($nl == 0)
	exit('学而时习之，不亦说乎');

if ($mode == 'day') {
	$day = -1;
	$n = rand(0, $nl);
	$new = true;
	if (file_exists('diary.tmp')) {
		$tmp = file('diary.tmp');
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
		$fp = fopen('diary.tmp', "w+");
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
