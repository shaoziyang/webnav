<?php

$base_path = dirname(__DIR__);
$file_cfg = $base_path.'/scripts/wallpaper.txt';
$file_css = $base_path.'/styles/wallpaper.css';


$fp = fopen($file_cfg, "w+");
if ($fp) {
	$canWrite = false;
	while (!$canWrite)
		$canWrite = flock($fp, LOCK_EX);

	fwrite($fp, '0||'.time().'|| '.PHP_EOL);
	flock($fp, LOCK_UN);
	fclose($fp);
}

// 删除 wallpaper.css
if (file_exists($file_css))
	unlink($file_css);

?>

<script>
	alert('背景图像已取消，自动更换背景功能已禁用');
	history.back();
</script>