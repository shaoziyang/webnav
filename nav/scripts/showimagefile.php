<html>
<head>
<title>随心远航背景图库</title>
</head>
<body>
<?php

    // get image file list
    $image_list = array_merge(glob('../images/*.png'), glob('../images/*.jpg'), glob('../images/*.webp'));

    $fl = '<a href="../">返回导航</a>&emsp;<a href="bingwallpaper.php">必应每日一图</a><br><br>一共有'.count($image_list).'个图形文件<br><br>';
    $n = 1;
    foreach($image_list as $v){
        $fl = $fl.'<a class="sxyhButton_img" href="'.$v.'"><img width="300" border="0" src=../images/'.$v.'>'.$n.' - [ '.substr($v,10).' ]</a>'.PHP_EOL;
        $n++;
    }
    
    $fl = $fl.'<br><br><a href="../">返回导航</a>';
    $fl = $fl.'<style> .sxyhButton_img {background-color:transparent;border-radius:0px;border:0px solid  #transparent;display:inline-block;cursor:pointer;font-family:宋体;font-size:12px;text-decoration:none;margin:10px;width:300px; height: 28px;line-height: 28px;}</style>';

    echo $fl;
?>
</body>
</html>