<?php

$path = dirname(__DIR__);
$file_cfg = $path.'/scripts/wallpaper.txt';
$file_css = $path.'/styles/wallpaper.css';
$DT=86400;
$time_last = 0;
$image = '';

$fn = $_GET['file'];
if (!file_exists($path.'/images/'.$fn)||($fn==''))
    exit('图像文件 < '.$fn.'> 文件不存在');

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

$fp = fopen($file_cfg,"w+");
if ($fp)
{
  $canWrite = false;
  while (!$canWrite)
     $canWrite = flock($fp, LOCK_EX);

  fwrite($fp, $DT.'||'.time().'||'.'images/'.$fn);
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
  fwrite($fp, '    background-image: url(../images/'.$fn.');'.PHP_EOL);
  fwrite($fp, '    background-repeat: no-repeat;'.PHP_EOL);
  fwrite($fp, '    background-size: cover;'.PHP_EOL);
  fwrite($fp, '    background-attachment: fixed;'.PHP_EOL.'}');
  flock($fp, LOCK_UN);
  fclose($fp);
}
?>
