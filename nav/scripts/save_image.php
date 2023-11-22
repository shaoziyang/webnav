<?php

$url=$_SERVER["REQUEST_URI"];
$p = parse_url($url);
parse_str($p['query'], $r);


$image_url = $r['url'];
$fn = dirname(dirname(__FILE__)).'/images/'.$r['filename'];

// 下载图像
$image_data = file_get_contents($image_url);

// 将图像写入指定的目录
if (file_put_contents($fn, $image_data) === false) {
    echo '<h1><font color=red>保存文件失败</font></h1>';
    http_response_code(500);
} else {
    echo '<h1><font color=green>保存文件成功</fonr></h1>';
    http_response_code(200);
}

// 关闭窗口
echo '<script>setTimeout(function(){ window.close();}, 1000);</script>';

?>