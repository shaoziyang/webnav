<?php

$base_path = dirname(__DIR__);
$file_cfg = $base_path.'/scripts/wallpaper.txt';
$file_css = $base_path.'/styles/wallpaper.css';
$DT = 86400;
$time_last = 0;
$image = '';

$force = ($_GET['force']==1);

// 读取配置
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
}

// 禁止自动更新
if (($DT <= 0)&&(!$force))
    return;


$image_list = array_merge(glob($base_path.'/images/*.png'), glob($base_path.'/images/*.jpg'), glob($base_path.'/images/*.webp'));
$n = strlen($base_path)+1;
foreach($image_list as &$v)
    $v = substr($v, $n);

if (count($image_list) ==0)  // no image files
    return;

$T = time();
$image_new = $image;
$sav = false;

if ($force||($T > ($DT + $time_last))||($image == '')||(!file_exists($file_css)))
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
    $fp = fopen($file_cfg,"w+");
    if ($fp)
    {
      $canWrite = false;
      while (!$canWrite)
         $canWrite = flock($fp, LOCK_EX);

      fwrite($fp, $DT.'||'.$T.'||'.$image_new);
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

$r = strlen($image_new) > 7?substr($image_new, 7):'';
echo "<script>var back_image="."'$r';</script>";

?>
