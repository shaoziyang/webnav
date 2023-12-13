<?php session_start(); if (intval($_SESSION['sxyh']['authenticated'] ?? '')==0) exit; ?>
<html>
<head>
	<title>随心远航系统背景图</title>
	<link type="text/css" rel="stylesheet" href="../styles/styles-custom.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="../styles/styles.css" media="screen,projection" />
	<meta name="viewport" content="width=device-width" />
	<style>
		.sxyhText_01 {
			text-align: center;
		}
	</style>
</head>
<body>
	<?php

	$base_path = dirname(__DIR__).'/images/';
	$url = dirname(dirname($_SERVER["REQUEST_URI"])).'/images/';

	$fn = $_GET['file'];
	if (!file_exists($base_path.$fn) || ($fn == ''))
		exit('图像文件 < '.$fn.'> 文件不存在');

	echo '<div class="sxyhText_01"><font size="+3em"><b>图像文件查看</b></font><br><br>';
	echo '<a href="'.$url.$fn.'"><img width="800" src="'.$url.$fn.'" border="12" style="border-color:#e5a032; border-style:ridge;"></a><br><br>';

	list($width, $height, $type, $attr) = getimagesize($base_path.$fn);
	
	echo '<table align="center" cellpadding="0" cellspacing="8">';
	echo '<tr><td>文件名</td><td width=24px></td><td>'.$fn.'</td></tr>';
	echo '<tr><td>创建时间</td><td></td><td>'.date("Y 年 m 月 d 日 H 时 i 分 s 秒",filectime($base_path.$fn)).'</td></tr>';
	echo '<tr><td>分辨率</td><td></td><td>'.$width.' x '.$height.'</td></tr>';
	echo '<tr><td>大小</td><td></td><td>'.filesize($base_path.$fn).'</td></tr>';
	echo '</table>';
	echo '</div><br>';

	?>
	<div class="sxyhText_01">
		<button class="sxyhButton_02" style="border:0px;width:180px" onclick="setbackimage()">设置为系统背景</button><br>
		<a class="sxyhButton_02" style="border:0px;background-color:#2156CD;width:180px" href="showimagelist.php">返回</a>
		<br><br><font color=#FF8000>设置系统背景后如果没有变化，请<b>清除浏览器缓存</b>后刷新页面，或者<b>按下 Ctrl-F5 键</b>刷新。</font>
	</div>


	<script>
		function setbackimage() {
			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'setbackimage.php?file=<?= $fn ?>', true);
			xhr.send(null);
			alert("设置成功！");
			window.location.href = "showimagelist.php";
		}
	</script>

</body>
</html>