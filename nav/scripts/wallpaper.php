<?php

$DT = 30;  // 自动改变壁纸时间，默认1天，86400秒，9代表禁用

$file_last = 'scripts/last.txt';
$file_css = 'styles/wallpaper.css';
$time_last = 0;
$image = '';

if($DT == 0)return;

if (file_exists($file_last))
{
    $c_file = array();
    $fp = fopen($file_last, "r");

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
        list($time_last, $image) = explode("||", $c_file[0]);
}


$image_list = array_merge(glob('images/*.png'), glob('images/*.jpg'), glob('images/*.webp'));

if (count($image_list) ==0)  // no image files
    return;

$T = time();
$image_new = $image;
$sav = false;


if ((intdiv($T, $DT) > intdiv($time_last, $DT))||($image == ''))
{
    $sav = true;
    if(count($image_list)==1)
        $image_new = $image_list[0];
    else
        while($image_new == $image)
        {
            $n = rand(0, count($image_list)-1);
            $image_new = $image_list[$n];
        }
}


if ($sav)
{
    $fp = fopen($file_last,"w+");
    if ($fp)
    {
      $canWrite = false;
      while (!$canWrite)
         $canWrite = flock($fp, LOCK_EX);

      fwrite($fp, $T.'||'.$image_new);
      flock($fp, LOCK_UN);
      fclose($fp);
    }
    $fp = fopen($file_css,"w+");
    if ($fp)
    {
      $canWrite = false;
      while (!$canWrite)
         $canWrite = flock($fp, LOCK_EX);

      fwrite($fp, 'body {'.PHP_EOL);
      fwrite($fp, '    background-image: url(../'.$image_new.');'.PHP_EOL);
      fwrite($fp, '    background-repeat: no-repeat;'.PHP_EOL);
      fwrite($fp, '    background-size: cover;'.PHP_EOL);
      fwrite($fp, '    background-attachment: fixed;'.PHP_EOL.'}');
      flock($fp, LOCK_UN);
      fclose($fp);
    }
}

?>
