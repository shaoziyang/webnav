<html>
<head>
<title>随心远航系统背景图</title>
<link type="text/css" rel="stylesheet" href="../styles/styles-custom.css" media="screen,projection"/>
</head>
<body>
<?php

$base_path = dirname(__DIR__).'/images/';
$url=dirname(dirname($_SERVER["REQUEST_URI"])).'/images/';

$fn = $_GET['file'];
if (!file_exists($base_path.$fn)||($fn==''))
    exit('图像文件 < '.$fn.'> 文件不存在');

echo '<div align=center><h1>图像文件查看</h1>';
echo '<a href="'.$url.$fn.'"><img width="800" src="'.$url.$fn.'"></a><br><br>';

list($width, $height, $type, $attr) = getimagesize($base_path.$fn);
echo '文件名：'.$fn.'<br><br>';
echo '大小：'.$width.' x '.$height.'<br><br>';
echo '</div>';

?>
<div align=center>
<button class="sxyhButton_02" style="border:0px;width:180px" onclick="setbackimage()">设置为系统背景</button><br>
<a class="sxyhButton_02" style="border:0px;background-color:#2156CD;width:180px" href="showimagelist.php">返回</a>
<br><br><font color=#FF8000>设置系统背景后如果没有变化，请<b>清除浏览器缓存</b>后刷新页面，或者<b>按下 Ctrl-F5 键</b>刷新。</font>
</div>


<script>
function setbackimage(){

var xhr = new XMLHttpRequest();
    xhr.open('GET', 'setbackimage.php?file=<?= $fn ?>', true);
    xhr.send(null);
    alert("设置成功！");
    window.location.href="showimagelist.php";
}
</script>

</body>
</html>
