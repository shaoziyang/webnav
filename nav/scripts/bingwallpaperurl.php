<?php

$str = file_get_contents('https://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
if (preg_match("/<url>(.+?)<\/url>/", $str, $matches)) {
	$imgurl = 'https://cn.bing.com'.$matches[1];
}

if (!isset($imgurl)) {
	$imgurl = 'https://api.dujin.org/bing/1920.php';
}

header("Content-Type: image/jpeg");
readfile($imgurl);

?>