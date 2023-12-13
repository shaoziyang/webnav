<?php session_start();?>
<html>
<head>
	<title>必应每日一图</title>
	<link type="text/css" rel="stylesheet" href="../styles/styles-custom.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="../styles/styles.css" media="screen,projection" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style>
		.sxyhImg_01 {
			text-align: left;
			display: inline-block;
		}
	</style>
</head>
<body>

	<?php

	$str = file_get_contents('https://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
	if (preg_match("/<url>(.+?)<\/url>/", $str, $matches)) {
		$imgurl = 'https://cn.bing.com'.$matches[1];
		$cr = preg_match("/<copyright>(.+?)<\/copyright>/", $str, $matches)?$matches[1]:'';
		$dt = preg_match("/<startdate>(.+?)<\/startdate>/", $str, $matches)?$matches[1]:'';
	}

	if ($imgurl) {
		echo '<H1>必应每日一图</H1><br>';
		$v1 = parse_url($imgurl);
		parse_str($v1['query'], $v2);
		$fn = $v2['id'];

		echo '<div  class="sxyhImg_01"><a href="'.$imgurl.'"><img width="800" src="'.$imgurl.'"></a></div>';
		echo '<br><br><br>获取时间：'.date("Y-m-d H:i:s").'<br>图像日期：'.$dt.'<br>图像说明：'.$cr.'<br><br>图像链接：<a href="'.$imgurl.'">'.$imgurl.'</a><br><br>';

	} else {
		exit('获取必应每日一图失败，请刷新页面重新获取<br><br><div><a href="javascript:history.go()">刷新</a></div>');
	}
	?>
	<?php 
	if (intval($_SESSION['sxyh']['authenticated'] ?? '')>0)
		echo '<button class="sxyhButton_02" style="width: 200px;" onclick="window.open(\'save_image.php?url='.$imgurl.'&filename='.$dt.'-'.$fn.'\')">保存图像到背景图库</button>';
	?>
	<br><br><br>
	<div>
		<a href="javascript:history.back(-1)">返回</a>
	</div>

</body>
</html>