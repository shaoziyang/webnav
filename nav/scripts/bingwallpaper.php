<html>
<head>
<title>必应每日一图</title>
<style>
.sxyhButton_02 {
	background-color:#579438;
	border-radius:4px;
	border:2px solid #4b8f29;;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:宋体;
	font-size:16px;
	font-weight:bold;
	text-decoration:none;
	text-align: center;
	margin: 5px;
	width: 120px; 
	height: 28px;
	line-height: 28px;
}
.sxyhButton_02:hover {
	background-color:#579438;
}
.sxyhButton_02:active {
	position:relative;
	top:1px;
}

</style>
</head>
<body>

<?php

$str=file_get_contents('https://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
if (preg_match("/<url>(.+?)<\/url>/", $str, $matches)) {
    $imgurl='https://cn.bing.com'.$matches[1];
    $cr = preg_match("/<copyright>(.+?)<\/copyright>/", $str, $matches)?$matches[1]:'';
    $dt = preg_match("/<startdate>(.+?)<\/startdate>/", $str, $matches)?$matches[1]:'';
}

if ($imgurl) {
    echo '<H1>必应每日一图</H1><div><a href="javascript:history.back(-1)">返回</a></div><br>';
    $v1 = parse_url($imgurl);
    parse_str($v1['query'], $v2);
    $fn=$v2['id'];
    echo '<div id="image-container">';
    echo '<img id="image" width=800 title="'.$fn.'"src="'.$imgurl.'"></div>';
    echo '<br><a href="'.$imgurl.'">'.$imgurl.'</a><br><br>日期：'.$dt.'<br>说明：'.$cr.'<br><br>';
    
    
} else {
    exit('获取必应每日一图失败');
}
?>

<a class="sxyhButton_02" target="_blank" style="width:200px" href="<?php echo 'save_image.php?url='.$imgurl.'&filename='.$dt.'-'.$fn; ?>">保存图像到背景图库</a>
<br><br><br>
<div><a href="javascript:history.back(-1)">返回</a></div>

</body>
</html>