<html>
<head>
<title>随心远航背景图库</title>
<link type="text/css" rel="stylesheet" href="../styles/styles-custom.css" media="screen,projection"/>
</head>
<body>
<?php

$base_path = dirname(__DIR__);
$file_cfg = $base_path.'/scripts/wallpaper.txt';

$DT = 86400;
$time_last = 0;
$image = '';

if (file_exists($file_cfg))
{
    $c_file = array();
    $fp = fopen($file_cfg, "r");

    if ($fp)
    {
      $canWrite = false;
      while (!$canWrite)
         $canWrite = flock($fp, LOCK_EX);

      while (!feof($fp))
      {
         $line = trim(fgets($fp, 1024));
         if ($line != "")
            $c_file[] = $line;
      }
      flock($fp, LOCK_UN);
      fclose ($fp);
    }

    if (sizeof($c_file) > 0)
        list($DT, $time_last, $image) = explode("||", $c_file[0]);

    
    if(strlen($image)>7)
        $image = substr($image,7);
}

echo '<a href="../">返回导航</a>&emsp;<a href="bingwallpaper.php">必应每日一图</a><br><br>';

echo '<form action="setwallpaperinterval.php" name="formu"><p>背景自动更新时间 '.$DT.' 秒（0代表禁止自动更新）。<input type="text" name="time" value="'.$DT.'" maxlength="6" size="8" style="text-align:right;"> 秒 <input type="submit" style="border:0px;width:120px" class="sxyhButton_03" value="设置新时间" />&emsp;<a class="sxyhButton_03" style="border:0px;width:120px;background-color:#2875ed;" href="changewallpaper.php" onclick="history.go(0)">立即更新背景</a></p></form>';

// get image file list
$image_list = array_merge(glob('../images/*.png'), glob('../images/*.jpg'), glob('../images/*.webp'));

$fl = '一共有'.count($image_list).'个图形文件。当前背景：'.$image.'<br><br>';
$n = 1;
foreach($image_list as $v){
    $fn = substr($v,10);
    if ($fn==$image) $fn = '<b><font size="+2em">'.$fn.'</font></b>';
    $fl = $fl.'<a class="sxyhButton_img" href="'.$v.'"><img width="300" border="0" src=../images/'.$v.'>'.$n.' - [ '.$fn.' ]</a>'.PHP_EOL;
    $n++;
}

$fl = $fl.'<br><br><a href="../">返回导航</a>';
$fl = $fl.'<style> .sxyhButton_img {background-color:transparent;border-radius:0px;border:0px solid  #transparent;display:inline-block;cursor:pointer;font-family:宋体;font-size:12px;text-decoration:none;margin:10px;width:300px; height:28px;line-height:28px;}</style>';

echo $fl;

?>
</body>
</html>
